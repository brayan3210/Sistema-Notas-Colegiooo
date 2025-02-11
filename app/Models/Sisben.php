<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sisben extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_sisben';

    protected $table = 'sisben';

    protected $fillable = ['sisben'];
}
