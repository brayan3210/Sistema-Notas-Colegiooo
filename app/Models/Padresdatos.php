<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padresdatos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_padre';


    protected $table = 'informacionpadres';
        public $timestamps = false;


    protected $fillable = [
        'nombres',
        'numero_docu',
        'municipio_expe',
        'edad',
        'parentesco',
        'telefono',
        'direccion',
        'ocupacion',
        'id_estudiante',
    ];
    public function estudiantes()
    {
        return $this->belongsTo(Estudiantepadre::class, 'id_estudiante');
    }
}
