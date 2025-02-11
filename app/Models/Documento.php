<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_documento';


    protected $table = 'documentotipo';

    protected $fillable = ['tipo_documento'];
}
