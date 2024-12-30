<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CicloEscolar extends Model
{
    use HasFactory;
    protected $table = "ciclo_escolar";
    protected $primaryKey = "id_ciclo";
    public $timestamps = false;
}
