<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodosAcademicos extends Model
{
    use HasFactory;

    protected $table = 'periodos_academicos';
    protected $primaryKey = 'id_periodo';
    public $timestamps = false;

    protected $fillable = [
        'nombre_periodo',
    ];

    // Relación con Notas
    public function notas()
    {
        return $this->hasMany(Notas::class, 'id_periodo');
    }
}
