<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentoPublicacionBlog extends Model
{
    protected $table = 'documentos_publicaciones';
    protected $primaryKey = 'id_documento';
    
    protected $fillable = [
        'id_publicacion',
        'ruta_documento',
        'tipo_documento'
    ];

    public function publicacion()
    {
        return $this->belongsTo(Publicacionesblog::class, 'id_publicacion');
    }
}