<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicacionesLactantes extends Model
{
    use HasFactory;
    protected $table = "indicaciones_cuiadados_lactantes";
    protected $primaryKey = "id_indicacion_cuidado_lactantes";
    public $timestamps = false;
}
