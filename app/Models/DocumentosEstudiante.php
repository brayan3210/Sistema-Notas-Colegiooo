<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentosEstudiante extends Model
{
    use HasFactory;

    protected $table = 'documentos_estudiantes';
    protected $primaryKey = 'id_documento'; // Cambia esto por el nombre correcto
    public $timestamps = false;

    
    protected $fillable = [
        'id_estudiante',
        'fotocopia_registro_civil',
        'fotocopia_carnet_vacunas',
        'fotocopia_carnet_covid',
        'fotocopia_carnet_crecimiento',
        'certificado_eps',
        'certificado_medico_visual_auditivo',
        'fotocopia_documento_padres_acudiente',
        'fotocopia_observador_estudiante',
        'boletin_anterior',
        'paz_salvo_anterior',
        'certificado_grado_quinto',
        'retiro_simat',
        'fotos_3x4',
    ];
//antes estaba matriculasestudiantes
    public function estudiante()
    {
        return $this->belongsTo(EstudianteDocumento::class, 'id_estudiante');
    }
}