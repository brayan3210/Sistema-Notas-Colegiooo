<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\MatriculasEstudiantes;

class ProcesarPromocionDimensiones extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promocion:dimensiones';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Procesa la promoción o reinicio de desempeños (y capacidades) en dimensiones de los estudiantes al finalizar el año académico';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Iniciando el proceso de promoción/reinicio de dimensiones...');

        // Obtener todos los estudiantes que están en grados 1, 2 o 3.
        $estudiantes = MatriculasEstudiantes::whereIn('id_grado', [1, 2, 3])->get();

        foreach ($estudiantes as $estudiante) {
            // Inicializamos los flags para determinar si el estudiante tiene evaluaciones completas y sin "Bajo".
            $todasCompletas = true;
            $reprobo = false;

            // Obtenemos las dimensiones asignadas para el grado del estudiante.
            $dimensiones = DB::table('materias_dimensiones')
                ->where('id_grado', $estudiante->id_grado)
                ->get();

            foreach ($dimensiones as $dim) {
                // Recopilamos los desempeños para la dimensión actual (se espera uno por cada período).
                $desempenos = DB::table('notas_dimensiones')
                    ->where('id_estudiante', $estudiante->id_estudiante)
                    ->where('id_materia_dim', $dim->id_materia_dim)
                    ->pluck('desempeno');

                if ($desempenos->count() < 4) {
                    $todasCompletas = false;
                    break;
                }
                if ($desempenos->contains('Bajo')) {
                    $reprobo = true;
                }
            }

            if ($todasCompletas && !$reprobo) {
                // Si el estudiante tiene evaluaciones completas y ninguna "Bajo":
                // 1. Registrar el historial.
                $this->registrarHistorialDimensiones($estudiante);

                // 2. Promover:
                if ($estudiante->id_grado < 3) {
                    $estudiante->id_grado++;
                } elseif ($estudiante->id_grado == 3) {
                    $estudiante->id_grado = 4;
                }
                $estudiante->save();
                $this->info("Estudiante {$estudiante->id_estudiante} promovido.");
            } else {
                // Si el estudiante no cumple los requisitos, reiniciamos los campos de desempeño, fallas y capacidades.
                DB::table('notas_dimensiones')
                    ->where('id_estudiante', $estudiante->id_estudiante)
                    ->update([
                        'desempeno'  => null,   // Reiniciamos el desempeño
                        'fallas'     => 0,      // Reiniciamos las fallas
                        'capacidades' => null,   // Reiniciamos las capacidades (o usa json_encode([]) si prefieres un array vacío)
                    ]);

                $this->info("Desempeños y capacidades de estudiante {$estudiante->id_estudiante} reiniciados.");
            }
        }

        $this->info('Proceso de promoción/reinicio finalizado.');
    }

    /**
     * Registra en la tabla 'historial_academico_dimensiones' los desempeños finales
     * de las dimensiones para el estudiante que está finalizando su grado.
     *
     * @param \App\Models\MatriculasEstudiantes $estudiante
     */
    protected function registrarHistorialDimensiones($estudiante)
    {
        $dimensiones = DB::table('materias_dimensiones')
            ->where('id_grado', $estudiante->id_grado)
            ->get();

        $resumen = [];

        foreach ($dimensiones as $dim) {
            $desempenos = DB::table('notas_dimensiones')
                ->where('id_estudiante', $estudiante->id_estudiante)
                ->where('id_materia_dim', $dim->id_materia_dim)
                ->orderBy('id_periodo', 'asc')
                ->pluck('desempeno');

            $resumen[$dim->nombre_dimension] = $desempenos;
        }

        DB::table('historial_academico_dimensiones')->insert([
            'id_estudiante'    => $estudiante->id_estudiante,
            'id_grado'         => $estudiante->id_grado,
            'anio'             => now()->year,
            'dimensiones_json' => json_encode($resumen),
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);
    }
}
