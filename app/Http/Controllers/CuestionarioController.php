<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class CuestionarioController extends Controller
{
    public function guardar_cuestionario (Request $request,$id)
    {
        $request->merge(['fecha_nacimiento_t1' => Carbon::createFromFormat('d/m/Y', $request->input('fecha_nacimiento_t1'))->format('Y-m-d')]);
        $request->merge(['fecha_nacimiento_t2' => Carbon::createFromFormat('d/m/Y', $request->input('fecha_nacimiento_t2'))->format('Y-m-d')]);
        DB::table('contacto_emergencias')->where('id_aspirante', $id)
            ->update([
                'nombre_persona' => $request->nombre_emergencia,
                'telefono_casa' => $request->telefono1_emergencia,
                'telefono_trabajo' => $request->telefono2_emergencia
            ]);
        $aspirante = DB::table("aspirantes")->where('id_aspirante', $id)->first();

        $aspirante_alumno = DB::table("aspirantes")->where('id_aspirante', $id)
            ->update([
                "genero" => $request->genero_alumno,
                "domicilio_aspirante" => $request->calle_dom,
                "numero" => $request->numero_dom,
                "colonia" => $request->colonia_dom,
                "localidad" => $request->localidad_dom,
                'persona_autorizada' => $request->tutor
            ]);

        // Condiciones Medicas aspirante
        $migrana_al = !empty($request->migrana_al) ? 'Migraña' : '';
        $diabetes_al = !empty($request->diabetes_al) ? 'Diabetes' : '';
        $miopia_al = !empty($request->miopia_al) ? 'Miopia' : '';
        $epilepsia_al = !empty($request->epilepsia_al) ? 'Epilepsia' : '';
        $hipertension_al = !empty($request->hipertension_al) ? 'Hipertension' : '';
        $obesidad_al = !empty($request->obesidad_al) ? 'Obesidad' : '';
        $astigmatismo_al = !empty($request->astigmatismo_al) ? 'Astigmatismo' : '';
        $otro_al = !empty($request->otro_condiciones_al) ? 'Otro' : '';
        $ninguno_al = !empty($request->ninguna_al) ? 'Ninguno' : '';

        $condiciones[] = [
            'migrana' => $migrana_al,
            'hipertension' => $hipertension_al,
            'diabetes' => $diabetes_al,
            'obesidad' => $obesidad_al,
            'miopia' => $miopia_al,
            'astigmatismo' => $astigmatismo_al,
            'epilepsia' => $epilepsia_al,
            'otro' => $otro_al,
            'ninguno' => $ninguno_al
        ];

        $condiciones_aspirante = json_encode($condiciones);
        // Discapacidades de los aspirantes
        $discapacidad[] = [
            'motriz' => !empty($request->motriz_al) ? 'Motriz' : '',
            'visual' => !empty($request->visual_al) ? 'Visual' : '',
            'ninguna' => !empty($request->ninguna_dis_al) ? 'Ninguna' : '',
            'neurologica' => !empty($request->neurologica_al) ? 'Neurologica' : '',
            'auditiva' => !empty($request->auditiva_al) ? 'Auditiva' : '',
            'otra' => !empty($request->otra_al_discapacidad) ? 'Otra' : '',
        ];

        $discapacidad_aspirante = json_encode($discapacidad);
        // Guardar datos medicos del aspirante
        DB::table('datos_medicos_aspirante')->insert([
            'tipo_sangre' => $request->tipo_sangre,
            'alergia_alimento' => $request->alergia_alimentos,
            'alergia_medicamentos' => $request->alergia_medicamentos,
            'alergia_otro' => $request->alergia_otro,
            'alergia_animales' => $request->alergia_animales,
            'alergia_ambiente' => $request->alergia_ambiente,
            'cartilla_vacunacion' => $request->vacunacion,
            'vacunas_pendientes' => $request->vacunas_pendientes,
            'medicamentos_cronicos' => $request->medicamentos_cro,
            'nombre_medicamento' => $request->medicamentos_cronicos,
            'vacuna_covid' => $request->vacuna_covid,
            'condicion_fisica' => $condiciones_aspirante,
            'otra_condicion' => $request->condiciones_al_otro,
            'discapacidad' => $discapacidad_aspirante,
            'id_aspirante' => $id
        ]);

        // Condiciones padre
        $condiciones_t1[] = [
            'migrana' => !empty($request->miopia_t1) ? 'Migraña' : '',
            'hipertension' => !empty($request->hipertension_t1) ? 'Hipertension' : '',
            'embarazo' => !empty($request->embarazo_t1) ? 'Embarazo' : '',
            'diabetes' => !empty($request->diabetes_t1) ? 'Diabetes' : '',
            'obesidad' => !empty($request->obesidad_t1) ? 'Obesidad' : '',
            'miopia' => !empty($request->miopia_t1) ? 'Miopia' : '',
            'astigmatismo' => !empty($request->astigmatismo_t1) ? 'Astigmatismo' : '',
            'epilepsia' => !empty($request->epilepsia_t1) ? 'Epilepsia' : '',
            'fumador' => !empty($request->fumador_t1) ? 'Fumador' : '',
            'otro' => !empty($request->otro_condicion_t1) ? 'Otro' : '',
            'ninguno' => !empty($request->ninguno_t1) ? 'Ninguno' : ''
        ];

        $condiciones_tutor1 = json_encode($condiciones_t1);

        // Guardar condiciones padre
            DB::table('condiciones_fisicas_tutores')->insert([
                'nombre' => $request->nombre_t1,
                'parentesco' => $request->parentesco_t1,
                'ocupacion' => $request->ocupacion_t1,
                'vacuna_covid' => $request->vacuna_covid_t1,
                'condiciones_fisicas' => $condiciones_tutor1,
                'otra_condicion' => !empty($request->condicion_t1) ? $request->condicion_t1 : '',
                'id_tutor' => $request->id_papa,
                'id_aspirante' => $id,
            ]);

            DB::table('tutores')->where('id_tutor_padre',$request->id_papa)
            ->update([
                'fecha_nacimiento' => $request->fecha_nacimiento_t1,
                'ocupacion' => $request->ocupacion_t1,
                'telefono_casa_tutor' => $request->telefono_t1,
                'parentesco' => $request->parentesco_t1
            ]);

        // Condiciones madre
        $condiciones_t2[] = [
            'migrana' => !empty($request->miopia_t2) ? 'Migraña' : '',
            'hipertension' => !empty($request->hipertension_t2) ? 'Hipertension' : '',
            'embarazo' => !empty($request->embarazo_t2) ? 'Embarazo' : '',
            'diabetes' => !empty($request->diabetes_t2) ? 'Diabetes' : '',
            'obesidad' => !empty($request->obesidad_t2) ? 'Obesidad' : '',
            'miopia' => !empty($request->miopia_t2) ? 'Miopia' : '',
            'astigmatismo' => !empty($request->astigmatismo_t2) ? 'Astigmatismo' : '',
            'epilepsia' => !empty($request->epilepsia_t2) ? 'Epilepsia' : '',
            'fumador' => !empty($request->fumador_t2) ? 'Fumador' : '',
            'otro' => !empty($request->otro_condicion_t2) ? 'Otro' : '',
            'ninguno' => !empty($request->ninguno_t2) ? 'Ninguno' : ''
        ];

        $condiciones_tutor2 = json_encode($condiciones_t2);
        // Guardar condiciones madre
        DB::table('condiciones_fisicas_tutores')->insert([
            'nombre' => $request->nombre_t2,
            'parentesco' => $request->parentesco_t2,
            'ocupacion' => $request->ocupacion_t2,
            'vacuna_covid' => $request->vacuna_covid_t2,
            'condiciones_fisicas' => $condiciones_tutor2,
            'otra_condicion' => !empty($request->condicion_t2) ? $request->condicion_t2 : '',
            'id_tutor' => $request->id_mama,
            'id_aspirante' => $id,
        ]);

        DB::table('tutores')->where('id_tutor_padre', $request->id_mama)
            ->update([
                'fecha_nacimiento' => $request->fecha_nacimiento_t2,
                'ocupacion' => $request->ocupacion_t2,
                'telefono_casa_tutor' => $request->telefono_t2,
                'parentesco' => $request->parentesco_t2
            ]);

        // Insertar nombre del pdf
        DB::table("portafolios_inscripciones")->where('id_aspirante', $id)
            ->update([
                "pdf_medicos" => date('Ymd_His_') . 'cuestionario_salud.pdf',
            ]);
        return back()->with('alta', '.');
    }
}
