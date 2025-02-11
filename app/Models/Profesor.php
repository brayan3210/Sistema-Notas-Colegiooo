<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesores';
    protected $primaryKey = 'id_profesor';
    protected $fillable = ['nombre', 'email', 'password', 'id_grado'];
    protected $hidden = ['password'];

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'id_grado', 'id_grado');
    }
}
