<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteDocumento extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_estudiante';


    protected $table = 'matriculasestudiantes';

    protected $fillable = ['n_documento'];
}
