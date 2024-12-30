<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleAspiranteTutores extends Model
{
    use HasFactory;
    protected $table = "detalle_aspirante_tutores";
    protected $primaryKey = "id_detalle_aspirante_tutores";
    public $timestamps = false;
}
