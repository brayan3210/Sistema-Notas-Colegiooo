<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrador extends Authenticatable
{
    use HasFactory;

    protected $table = 'administradores';
    public $primaryKey = 'id_usuario';
    public $timestamps = false;
    protected $casts = [
        'force_change_password' => 'boolean',
    ];
    

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        //lo de force es para el estado de cambiar contraseña apenas se inicie con la nueva
        'force_change_password',
        'id_grado',
        'created_at',
    ];

    // Relación con GradoAcademico
    public function grado()
    {
        return $this->belongsTo(Grado::class, 'id_grado');
    }
}
