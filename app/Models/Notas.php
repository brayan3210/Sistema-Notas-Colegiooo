<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;

    protected $table = 'notas';
    protected $primaryKey = 'id_nota';
    public $timestamps = false;

    protected $fillable = [
        'id_estudiante',
        'id_materia',
        'id_periodo',
        'nota',
        'observaciones',
        'fecha_registro',
    ];

    // Relación con Estudiante
    public function estudiante()
    {
        return $this->belongsTo(MatriculasEstudiantes::class, 'id_estudiante');
    }

    // Relación con Materia
    public function materia()
    {
        return $this->belongsTo(Materias::class, 'id_materia');
    }

    // Relación con PeriodoAcademico
    public function periodo()
    {
        return $this->belongsTo(PeriodosAcademicos::class, 'id_periodo');
    }
}
