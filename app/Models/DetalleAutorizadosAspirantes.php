<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleAutorizadosAspirantes extends Model
{
    use HasFactory;
    protected $table = "detalle_autorizados_aspirantes";
    protected $primaryKey = "id_detalle_autorizados_aspirantes";
    public $timestamps = false;
}
