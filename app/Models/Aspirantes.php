<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirantes extends Model
{
    use HasFactory;
    protected $table = "aspirantes";
    protected $primaryKey = "id_aspirante";
    public $timestamps = false;
}
