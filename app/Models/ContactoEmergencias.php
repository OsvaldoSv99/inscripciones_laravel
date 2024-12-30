<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactoEmergencias extends Model
{
    use HasFactory;
    protected $table = "contacto_emergencias";
    protected $primaryKey = "id_contacto_emergencia";
    public $timestamps = false;
}
