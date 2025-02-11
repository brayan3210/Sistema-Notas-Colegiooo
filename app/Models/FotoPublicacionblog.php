<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoPublicacionblog extends Model
{
    protected $primaryKey = 'id_foto';


    protected $table = 'fotos_publicaciones';
        public $timestamps = false;


    protected $fillable = [
        'id_publicacion',   
        'ruta_foto',
    ];
   // public function publicacion()
    //{
     //   return $this->belongsTo(Publicacionesblog::class, 'id_publicacion');
   // }
   public function publicacion()
   {
       return $this->belongsTo(Publicacionesblog::class, 'id_publicacion', 'id_publicacion');
   }


}
