<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortafoliosInscripciones extends Model
{
    use HasFactory;
    protected $table = "portafolios_inscripciones";
    protected $primaryKey = "id_portafolio";
    public $timestamps = false;
}
