<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteEvidenciaPlanilla extends Command
{
    protected $signature = 'evidencia:delete';
    protected $description = 'Elimina las evidencias de planilla de notas al 31 de diciembre';

    public function handle()
    {
        // Verificar si hoy es 31 de diciembre
        if (now()->format('m-d') === '12-31') {
            // Obtener todas las evidencias
            $evidencias = DB::table('evidencia_planilla')->get();

            foreach ($evidencias as $evidencia) {
                // Eliminar archivo del disco "public"
                Storage::disk('public')->delete($evidencia->file_path);
            }
            // Eliminar registros de la tabla
            DB::table('evidencia_planilla')->delete();

            $this->info('Evidencias eliminadas exitosamente.');
        } else {
            $this->info('Hoy no es 31 de diciembre. No se elimina evidencia.');
        }
    }
}
