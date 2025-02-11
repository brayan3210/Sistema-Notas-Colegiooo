<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatriculasEstudiantes extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_estudiante';


    protected $table = 'matriculasestudiantes';
        public $timestamps = false;


    protected $fillable = [
        'nombres',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'genero',
        'id_documento',
        'n_documento',
        'rh',
        'eps',
        'id_sisben',
        'estrato_social',
        'discapacidad',
        'telefono',
        'direccion',
        'barrio',
        'municipio',
        'departamento',
        'id_grado',
        'estado_matricula',
        'documento_adjunto',
        'estado',
    ];

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'id_documento');
    }

    public function sisben()
    {
        return $this->belongsTo(Sisben::class, 'id_sisben');
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'id_grado');
    }
    public function notas()
    {
        return $this->hasMany(Notas::class, 'id_estudiante');
    }
}
