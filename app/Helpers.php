<?php

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

// Obtener la edad con la fecha de nacimiento
function edad($fecha)
{
    $fecha_nac = new \DateTime(date('Y/m/d',strtotime($fecha)));
    $fecha_hoy =  new \DateTime(date('Y/m/d',time()));
    $edad = date_diff($fecha_hoy,$fecha_nac);
    return $edad;
}


// Obtener grado del niño dependiendo de la fecha de nacimento
function obtener_grado($fecha_nacimiento,$inicio_clases_fecha)
{
    $datework = Carbon::createFromDate($fecha_nacimiento);
    $inicio_clases_fecha = Carbon::createFromDate($inicio_clases_fecha);
    // OBTENER LA DIFERENCIA DE AÑOS
    $testdate = $datework->diffInYears($inicio_clases_fecha);
    switch ($testdate) {
        // LACTANTES Y CAMINADORES
        case 0:
            $grado = 1;
            $grupo = 1;
            break;
        case 1:
            $grado = 1;
            $grupo = 1;
            break;
        // MATERNAL 1
        case 2:
            $grado = 4;
            $grupo = 1;
            break;
        // MATERNAL 2
        case 3:
            $grado = 5;
            $grupo = 1;
            break;
        // KINDER 2
        case 4:
            $grado = 6;
            $grupo = 1;
            break;
        // KINDER 3
        case 5:
            $grado = 7;
            $grupo = 1;
            break;
        // PREFIRST   
        default:
            $grado = 8;
            $grupo = 1;
            break;
    }
    $data;
    $data['grado'] = $grado;
    $data['grupo'] = $grupo;
    return $data;

}

function estilos_documentos($val){
    if ($val != null) {
        return "background-color:#dfebf7;border-radius:20px;padding:4px;padding:4px;";
    } else {
        return "background-color:#FAD4D5;border-radius:20px;padding:4px;padding:4px;";
    } 
}