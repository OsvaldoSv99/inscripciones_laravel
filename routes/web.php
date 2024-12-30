<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreregistroController;
use App\Http\Controllers\FichaInscripcionController;
use App\Http\Controllers\TrasladoController;
use App\Http\Controllers\CuestionarioController;
use App\Http\Controllers\IndicacionesController;
use App\Http\Controllers\RequisitosController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Inscripciones
    Route::get('inicio',[PreregistroController::class,'index'])->name("inicio");
    Route::get('inicio_aspirante/{id}',[PreregistroController::class,'inicio'])->name("inicio_aspirante");
    Route::get('nuevo_aspirante',[PreregistroController::class,'nuevo_aspirante'])->name("nuevo_aspirante");
    // Ficha de inscripcion
    Route::get('ficha_inscripcion',[PreregistroController::class,'ficha_inscripcion'])->name("ficha_inscripcion");
    Route::post('guardar_ficha',[FichaInscripcionController::class,'guardar_ficha_inscripcion'])->name("guardar_ficha");

    // Traslado
    Route::get('autorizacion_traslado/{id}',[PreregistroController::class,'traslado'])->name("autorizacion_traslado");
    Route::post('guardar_traslado/{id}',[TrasladoController::class,'guardar_traslado'])->name("guardar_traslado");

    // Cuestionario de salud
    Route::get('cuestionario_salud/{id}',[PreregistroController::class,'cuestionario_salud'])->name("cuestionario_salud");
    Route::post('guardar_cuestionario/{id}',[CuestionarioController::class,'guardar_cuestionario'])->name("guardar_cuestionario");

    // Indicaciones de cuidados
    Route::get('indicaciones_cuidados/{id}',[PreregistroController::class,'indicaciones'])->name("indicaciones_cuidados");
    Route::post('guardar_indicaciones/{id}',[IndicacionesController::class,'guardar_indicaciones'])->name("guardar_indicaciones");
    
    // Requisitos de Inscripcion
    Route::get('requisitos_inscripcion/{id}',[PreregistroController::class,'requisitos_inscripcion'])->name("requisitos_inscripcion");
    Route::post('guardar_documentos/{id}',[RequisitosController::class,'guardar_documentos'])->name("guardar_documentos");

    // Ajax
    Route::get('ajax_ingreso',[PreregistroController::class,'ajax_ingreso'])->name("ajax_ingreso");
    Route::get('ajax_indicaciones',[PreregistroController::class,'ajax_indicaciones'])->name("ajax_indicaciones");
    Route::post('guardar_firma',[PreregistroController::class,'guardar_firma'])->name("guardar_firma");
});


require __DIR__.'/auth.php';
