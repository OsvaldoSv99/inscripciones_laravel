<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndicacionesCaminadores;
use App\Models\IndicacionesLactantes;
use App\Models\IndicacionesMaternal;
use App\Models\PortafoliosInscripciones;
use App\Models\Aspirantes;

class IndicacionesController extends Controller
{
    public function guardar_indicaciones (Request $request,$id)
    {
        $aspirante = Aspirantes::find($id);
            // Lactantes A y B
            if ($aspirante->id_grado == 1 || $aspirante->id_grado == 2) {
                $glac = new IndicacionesLactantes();
                $glac->sobrenombre = $request->nombre_gusto;
                $glac->fecha_cuidados = date('Y-m-d');
                $glac->edad_ingreso = $request->edad_ingreso;
                $glac->horario_estancia = $request->horario_estancia;
                $glac->condicion_medica = $request->condicion_medica;
                $glac->dato_salud = $request->dato_salud;
                $glac->toma_leche = $request->toma_leche;
                $glac->leche_materna = $request->leche_materna;
                $glac->tiempo_calentamiento = $request->tiempo_calentamiento;
                $glac->formula_onzas = $request->formula_onzas;
                $glac->onzas_agua = $request->onzas_agua;
                $glac->temperatura = $request->temperatura;
                $glac->forma_tomar = $request->forma_tomar;
                $glac->come_papilla = $request->come_papilla;
                $glac->indicacion_alimentos = $request->indicacion_alimentos;
                $glac->alimento_prohibido = $request->alimento_prohibido;
                $glac->agua_natural = $request->agua_natural;
                $glac->horario_colegio = $request->horario_colegio;
                $glac->cambio_panal = $request->cambio_panal;
                $glac->indicacion_panal = $request->indicacion_panal;
                $glac->duerme_siesta = $request->duerme_siesta;
                $glac->forma_dormir = $request->forma_dormir;
                $glac->usa_chupon = $request->usa_chupon;
                $glac->otro = $request->otro;
                $glac->id_aspirante = $id;
                $glac->limitar_comer = $request->limitar_comer;
                $glac->Save();

                $act_port = PortafoliosInscripciones::where('id_aspirante',$id)->first();
                $act_port->pdf_indicaciones = date('Ymd_His_') . 'indicaciones_y_cuidados_lactantes.pdf';
                $act_port->Save();
                
            } elseif ($aspirante->id_grado == 3 ) {
                        // Caminadores
                $g_caminadores = new IndicacionesCaminadores();
                $g_caminadores->sobrenombre = $request->nombre_gusto;
                $g_caminadores->fecha_cuidados = date('Y-m-d');
                $g_caminadores->edad_ingreso = $request->edad_exacta;
                $g_caminadores->horario_estancia = $request->horario_estancia;
                $g_caminadores->condicion_medica = $request->condicion_medica;
                $g_caminadores->dato_salud = $request->dato_salud;
                $g_caminadores->leche_vaso = $request->leche_vaso;
                $g_caminadores->leche_caja = $request->leche_caja;
                $g_caminadores->tiempo_calentamiento = $request->tiempo_calentamiento;
                $g_caminadores->formula_onzas = $request->formula_onzas;
                $g_caminadores->onzas_agua = $request->onzas_agua;
                $g_caminadores->temperatura = $request->tiempo_calentamiento;
                $g_caminadores->alimento_prohibido = $request->alimento_prohibido;
                $g_caminadores->toma_agua = $request->toma_agua;
                $g_caminadores->horario_toma_agua = $request->horario_toma_agua;
                $g_caminadores->limitar_motivar = $request->limitar_comer;
                $g_caminadores->cambio_panal = $request->cambio_panal;
                $g_caminadores->indicaciones_panal = $request->indicacion_panal;
                $g_caminadores->siesta_horario = $request->horario_siesta;
                $g_caminadores->tiempo_siesta = $request->tiempo_siesta;
                $g_caminadores->forma_dormir = $request->forma_dormir;
                $g_caminadores->usa_chupon = $request->chupon;
                $g_caminadores->otro = $request->otro;
                $g_caminadores->id_aspirante = $id;
                $g_caminadores->Save();

                $act_port = PortafoliosInscripciones::where('id_aspirante',$id)->first();
                $act_port->pdf_indicaciones = date('Ymd_His_') . 'indicaciones_y_cuidados_lactantes.pdf';
                $act_port->Save();
            }
        
        // Si es maternal no necesita la pregunta de indicaciones, se envia por el grado directamente
        elseif ($aspirante->id_grado == 4 || $aspirante->id_grado == 5) {
            // Maternal
            $g_maternal = new IndicacionesMaternal();
            $g_maternal->sobrenombre = $request->nombre_gusto;
            $g_maternal->fecha_cuidados = date('Y-m-d');
            $g_maternal->edad_ingreso = $request->edad_ingreso;
            $g_maternal->horario_estancia = $request->horario_estancia;
            $g_maternal->condicion_medica = $request->condicion_medica;
            $g_maternal->dato_salud = $request->dato_salud;
            $g_maternal->alimento_prohibido = $request->alimento_prohibido;
            $g_maternal->toma_agua = $request->agua_natural;
            $g_maternal->horario_colegio = $request->horario_colegio;
            $g_maternal->limitar_motivar = $request->limitar_comer;
            $g_maternal->cambio_panal = $request->cambio_panal;
            $g_maternal->indicaciones_panal = $request->indicacion_panal;
            $g_maternal->siesta_horario = $request->siesta_horario;
            $g_maternal->tiempo_siesta = $request->tiempo_siesta;
            $g_maternal->otro = $request->otro;
            $g_maternal->id_aspirante = $id;
            $g_maternal->Save();

            $act_port = PortafoliosInscripciones::where('id_aspirante',$id)->first();
                $act_port->pdf_indicaciones = date('Ymd_His_') . 'indicaciones_y_cuidados_lactantes.pdf';
                $act_port->Save();
        }else {
            return redirect('aspirantes_preregistro/' . $id)->with('error_indicaciones', '.');
        }
        return back()->with('alta', '.');
        
    }
}
