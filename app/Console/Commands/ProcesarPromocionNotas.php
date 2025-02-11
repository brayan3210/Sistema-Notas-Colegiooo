<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MatriculasEstudiantes;
use App\Models\Notas;
use Carbon\Carbon;
use DB;

class ProcesarPromocionNotas extends Command
{
    protected $signature = 'promocion:notas';
    protected $description = 'Ejecuta la promoción anual de estudiantes y reinicia notas';

    public function handle()
    {
        $this->info('Iniciando proceso de promoción/reinicio de estudiantes...');

        // Obtener estudiantes de grados 4 al 9
        $estudiantes = MatriculasEstudiantes::whereBetween('id_grado', [4, 9])->get();

        foreach ($estudiantes as $estudiante) {
            // Validar promoción usando el método existente
            $materiasPrincipales = DB::table('materias')
                ->where('id_grado', $estudiante->id_grado)
                ->whereNull('id_materia_padre')
                ->get();

            $reprobo = false;
            $todasCompletas = true;

            foreach ($materiasPrincipales as $materiaPrincipal) {
                $submaterias = DB::table('materias')
                    ->where('id_materia_padre', $materiaPrincipal->id_materia)
                    ->where('id_grado', $estudiante->id_grado)
                    ->get();

                if ($submaterias->count() > 0) {
                    // Caso 1: Materia principal con submaterias
                    $promedioPrincipal = 0;
                    $contadorSubmaterias = 0;

                    foreach ($submaterias as $sub) {
                        $notasSub = Notas::where('id_estudiante', $estudiante->id_estudiante)
                            ->where('id_materia', $sub->id_materia)
                            ->pluck('nota');

                        if ($notasSub->count() < 4) {
                            $todasCompletas = false;
                            break 2;
                        }

                        $defSub = $notasSub->avg();
                        $promedioPrincipal += $defSub;
                        $contadorSubmaterias++;

                        if ($defSub < 3.0) {
                            $reprobo = true;
                        }
                    }

                    if ($contadorSubmaterias > 0) {
                        $promedioPrincipal = $promedioPrincipal / $contadorSubmaterias;
                        if ($promedioPrincipal < 3.0) {
                            $reprobo = true;
                        }
                    }
                } else {
                    // Caso 2: Materia principal sin submaterias
                    $notas = Notas::where('id_estudiante', $estudiante->id_estudiante)
                        ->where('id_materia', $materiaPrincipal->id_materia)
                        ->pluck('nota');

                    if ($notas->count() < 4) {
                        $todasCompletas = false;
                        break;
                    }

                    $definitiva = $notas->avg();
                    if ($definitiva < 3.0) {
                        $reprobo = true;
                    }
                }
            }

            // Procesar al estudiante según sus resultados
            if ($todasCompletas) {
                if (!$reprobo) {
                    // Registrar historial antes de promover
                    $this->registrarHistorialAcademico($estudiante);

                    // Promover estudiante
                    if ($estudiante->id_grado == 9) {
                        $estudiante->estado = 'Finalizado';
                    } else {
                        $estudiante->id_grado++;
                    }
                    $estudiante->save();
                    $this->info("Estudiante {$estudiante->id_estudiante} promovido.");
                } else {
                    // Reiniciar notas para el siguiente año
                    Notas::where('id_estudiante', $estudiante->id_estudiante)->update([
                        'nota' => null,
                        'observaciones' => null
                    ]);
                    $this->info("Notas del estudiante {$estudiante->id_estudiante} reiniciadas por reprobación.");
                }
            }
        }

        $this->info('Proceso de promoción/reinicio finalizado.');
    }

    private function registrarHistorialAcademico($estudiante)
    {
        $definitivas = [];
        $materiasPrincipales = DB::table('materias')
            ->where('id_grado', $estudiante->id_grado)
            ->whereNull('id_materia_padre')
            ->get();

        foreach ($materiasPrincipales as $materiaPrincipal) {
            $submaterias = DB::table('materias')
                ->where('id_materia_padre', $materiaPrincipal->id_materia)
                ->where('id_grado', $estudiante->id_grado)
                ->get();

            if ($submaterias->count() > 0) {
                $defMateriaPrincipal = 0;
                $contadorSubs = 0;

                foreach ($submaterias as $sub) {
                    $notasSub = Notas::where('id_estudiante', $estudiante->id_estudiante)
                        ->where('id_materia', $sub->id_materia)
                        ->pluck('nota');

                    $promSub = $notasSub->avg() ?? 0;
                    $definitivas[$sub->nombre_materia] = round($promSub, 2);

                    $defMateriaPrincipal += $promSub;
                    $contadorSubs++;
                }

                if ($contadorSubs > 0) {
                    $defMateriaPrincipal = $defMateriaPrincipal / $contadorSubs;
                    $definitivas[$materiaPrincipal->nombre_materia] = round($defMateriaPrincipal, 2);
                }
            } else {
                $notas = Notas::where('id_estudiante', $estudiante->id_estudiante)
                    ->where('id_materia', $materiaPrincipal->id_materia)
                    ->pluck('nota');

                $prom = $notas->avg() ?? 0;
                $definitivas[$materiaPrincipal->nombre_materia] = round($prom, 2);
            }
        }

        DB::table('historial_academico')->insert([
            'id_estudiante' => $estudiante->id_estudiante,
            'id_grado' => $estudiante->id_grado,
            'anio' => now()->year,
            'definitivas' => json_encode($definitivas),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}