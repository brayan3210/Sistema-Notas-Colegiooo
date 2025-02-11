<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Novedades extends Model
{
    protected $fillable = [
        'titulo',
        'contenido',
        'fecha_publicacion',
        'imagen',
    ];
}