<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Verificacion_code extends Model
{
    use HasFactory;

    // Definir los campos que son asignables en masa
    protected $fillable = [
        'email',
        'code',
        'expires_at',
    ];

    // Indicar que la fecha `expires_at` es un campo de tipo timestamp
    protected $dates = ['expires_at'];

    // Función para verificar si el código ha expirado
    public function isExpired()
    {
        return $this->expires_at->isPast();
    }
}
