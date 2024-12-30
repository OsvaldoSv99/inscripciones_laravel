<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorizados extends Model
{
    use HasFactory;
    protected $table = "autorizados";
    protected $primaryKey = "id_autorizado";
    public $timestamps = false;
}
