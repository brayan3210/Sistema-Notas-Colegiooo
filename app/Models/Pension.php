<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    use HasFactory;

    protected $table = 'pensiones';
    public $timestamps = false;


    protected $fillable = [
        'id_estudiante',
        'estado_pago',
    ];

    public function estudiante()
    {
        return $this->belongsTo(MatriculasEstudiantes::class, 'id_estudiante');
    }
}
