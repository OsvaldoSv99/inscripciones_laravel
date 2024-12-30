<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioRegistro extends Model
{
    use HasFactory;
    protected $table = "usuario_registro";
    protected $primaryKey = "id_registro";
    public $timestamps = false;
}
