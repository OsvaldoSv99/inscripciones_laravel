<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicacionesMaternal extends Model
{
    use HasFactory;
    protected $table = "indicaciones_cuidados_maternal";
    protected $primaryKey = "id_indicacion_cuidado_maternal";
    public $timestamps = false;
}
