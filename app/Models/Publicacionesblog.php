<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacionesblog extends Model
{
    protected $primaryKey = 'id_publicacion';


    protected $table = 'publicaciones';
        public $timestamps = true;


    protected $fillable = [
        'titulo_publicacion',   
        'descripcion',
    ];
    public function fotos()
    {
        return $this->hasMany(FotoPublicacionblog::class, 'id_publicacion', 'id_publicacion');
    }
    public function documentos()
    {
        return $this->hasMany(DocumentoPublicacionblog::class, 'id_publicacion');
    }


}
