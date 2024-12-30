<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicacionesCaminadores extends Model
{
    use HasFactory;
    protected $table = "indicaciones_cuidados_caminadores";
    protected $primaryKey = "id_indicacion_cuidado_caminadores";
    public $timestamps = false;
}
