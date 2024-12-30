<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirantes;
use App\Models\CicloEscolar;
use App\Models\PortafoliosInscripciones;
use Carbon\Carbon;
use Auth;
use DB;
use App\Models\Autorizados;

class PreregistroController extends Controller
{

    public function index()
    {
        $aspirantes = Aspirantes::all();
        return view('index',compact('aspirantes'));
    }

    public function inicio ($id)
    {
        $aspirante= Aspirantes::join('grados','grados.id_grado','aspirantes.id_grado')->first();
        $documentos = DB::table('portafolios_inscripciones')->where('id_aspirante', $id)->first();
        return view ('inicio_preregistro',compact('aspirante','id','documentos'));
    }

    public function nuevo_aspirante()
    {
        return view('inicio_aspirante');
    }

    public function ficha_inscripcion (Request $request)
    {
        $data['sucursal'] = $request->sucursal;
        // // Convertir la fecha al formato  utilizando Carbon
        $data['fecha_nacimiento'] = $request->fecha_nacimiento;
        $data['fecha_nacimiento'] = Carbon::createFromFormat('d/m/Y', $data['fecha_nacimiento'])->format('Y-m-d');
        $data['edad'] = edad($data['fecha_nacimiento']);
        
        $data['aspirante'] = Aspirantes::join('grados', 'grados.id_grado', 'aspirantes.id_grado')
        ->join('usuario_registro', 'usuario_registro.id_aspirante', 'aspirantes.id_aspirante')
        ->join('detalle_aspirante_tutores', 'detalle_aspirante_tutores.id_aspirante', 'aspirantes.id_aspirante')
        ->join('tutores', 'tutores.id_tutor_padre', 'detalle_aspirante_tutores.id_tutor')
        ->where('usuario_registro.id_usuario_registro', Auth::id())
        ->get();
        $data['count'] = count($data['aspirante']); //saber si hay registros creados por el usuario
        if ($data['count'] != 0) {
            $us =DB::table('usuario_registro')->where('usuario_registro.id_usuario_registro',auth()->user()->id)->first();
            $data['padre'] = Aspirantes::join('grados', 'grados.id_grado', 'aspirantes.id_grado')
                ->join('usuario_registro', 'usuario_registro.id_aspirante', 'aspirantes.id_aspirante')
                ->join('detalle_aspirante_tutores', 'detalle_aspirante_tutores.id_aspirante', 'aspirantes.id_aspirante')
                ->join('tutores', 'tutores.id_tutor_padre', 'detalle_aspirante_tutores.id_tutor')
                ->where('usuario_registro.id_aspirante',$us->id_aspirante)
                ->select('tutores.*')
                ->orderBy('tutores.id_tutor_padre','desc')
                ->groupBy('detalle_aspirante_tutores.id_detalle_aspirante_tutores')
                ->get();
            $data['autorizados'] = Autorizados::join('detalle_autorizados_aspirantes', 'detalle_autorizados_aspirantes.id_autorizado', 'autorizados.id_autorizado')
                ->where('detalle_autorizados_aspirantes.id_aspirante', $data['aspirante'][0]->id_aspirante)
                ->get();
        }
        return view('ficha_inscripcion',$data);
    }

    public function ajax_ingreso(Request $request)
    {
        $ciclo=CicloEscolar::where('activo',1)->get();
        $data=[];
        $fecha_a_comprobar = Carbon::parse($request->fechaIngreso);
        foreach ($ciclo as $key => $c) {
            $fechas=explode('-',$c->nombre_ciclo);
            $fecha_inicio = Carbon::parse($fechas[0].'-08-01'); //Inicio del ciclo escolar siempre es el 1 de agosto
            $fecha_fin = Carbon::parse($fechas[1].'-07-31'); // El fin del ciclo escolar siempre es el 31 de julio
            if ($fecha_a_comprobar->between($fecha_inicio, $fecha_fin)) {
                $data['idCiclo'] = $c->id_ciclo;
                $data['ciclo_escolar'] = $c->nombre_ciclo;
              }
        }
        return response()->json($data);   
    }

    public function traslado ($id)
    {
        $aspirante = Aspirantes::find($id);
        $tutor = Aspirantes::join('detalle_aspirante_tutores', 'detalle_aspirante_tutores.id_aspirante', 'aspirantes.id_aspirante')
            ->join('tutores', 'tutores.id_tutor_padre', 'detalle_aspirante_tutores.id_tutor')
            ->where('aspirantes.id_aspirante', $id)
            ->select('tutores.*')
            ->get();
        return view ('traslado',compact('id','aspirante','tutor'));
    }
    
    public function cuestionario_salud ($id)
    {
        $data['aspirante'] = Aspirantes::join('grados', 'grados.id_grado', 'aspirantes.id_grado')
        ->where('aspirantes.id_aspirante', $id)
        ->first();
    $data['padre']=Aspirantes::join('grados','grados.id_grado','aspirantes.id_grado')
    ->join('detalle_aspirante_tutores','detalle_aspirante_tutores.id_aspirante','aspirantes.id_aspirante')
    ->join('tutores','tutores.id_tutor_padre','detalle_aspirante_tutores.id_tutor')
    ->where('aspirantes.id_aspirante',$id)
    // ->where('tutores.sexo','1')
    ->select('tutores.*')
    ->get();

    $data['emergencia']=DB::table("contacto_emergencias")->where('id_aspirante',$id)->first();

    $data['condicion_padre'] = DB::table('condiciones_fisicas_tutores')->where('id_tutor', $data['padre'][0]->id_tutor_padre)->get();
    $data['countpadre'] = count($data['condicion_padre']);
    if ($data['countpadre'] != 0) {
        $data['condiciones_fisicas1'] = json_decode($data['condicion_padre'][0]->condiciones_fisicas, true);
    }
    $data['condicion_madre'] = DB::table('condiciones_fisicas_tutores')->where('id_tutor', $data['padre'][1]->id_tutor_padre)->get();
    $data['countmadre'] = count($data['condicion_madre']);
    if ($data['countmadre'] != 0) {
        $data['condiciones_fisicas2'] = json_decode($data['condicion_madre'][0]->condiciones_fisicas, true);
    }
    $data['id'] = $id;

        return view('cuestionario_salud',$data);
    }

    // Indicaciones y cuidados
    public function indicaciones(Request $request, $id)
    {
        $aspirante = Aspirantes::find($id);
        // lactantes y caminadores son enviados dependiendo de que responda
        if ($aspirante->id_grado <= 3) {
            // Validar que el tipo de indicaciones y cuidados
            if ($aspirante->id_grado == 1 || $aspirante->id_grado == 2) {
                return view('indicaciones_lactantes', compact('id', 'aspirante'));
            } elseif ($aspirante->id_grado == 3 ) {
                return view('indicaciones_caminadores', compact('id', 'aspirante'));
            }else{
                return redirect()->route('aspirantes_preregistro',$id);
            }
        }
        // Si es maternal no necesita la pregunta de indicaciones, se envia por el grado directamente
        elseif ($aspirante->id_grado == 4 || $aspirante->id_grado == 5) {
            return view('indicaciones_maternal', compact('id', 'aspirante'));
        }else {
            return redirect('aspirantes_preregistro/' . $id)->with('error_indicaciones', '.');
        }
    }

    public function requisitos_inscripcion($id)
    {
        $count = DB::table('preregistros')->where('id_aspirante', $id)->count();
        if ($count == 0) {
            DB::table('preregistros')->insert([
                'id_aspirante' => $id,
                'cuenta_beca' => 0,
                'porcentaje' => 0,
            ]);
        } 
        $id_aspirante=$id;

        $padres=DB::table('detalle_aspirante_tutores')->join('tutores' , 'tutores.id_tutor_padre','detalle_aspirante_tutores.id_tutor')
        ->join('aspirantes','aspirantes.id_aspirante','detalle_aspirante_tutores.id_aspirante')
        ->where('aspirantes.id_aspirante',$id)
        ->get();

        // consulta para validar, si tienen solo 1 tutor o 2 tutores------------------------------
        $papa = DB::table('detalle_aspirante_tutores')
                            ->join('tutores', 'tutores.id_tutor_padre', '=', 'detalle_aspirante_tutores.id_tutor')
                            ->join('aspirantes', 'aspirantes.id_aspirante', '=', 'detalle_aspirante_tutores.id_aspirante')
                            ->where('aspirantes.id_aspirante', $id)
                            ->groupBy('detalle_aspirante_tutores.id_tutor')
                            ->count();
        $documentos = DB::table('preregistros')->where('id_aspirante',$id)->first();
        $aspirante = Aspirantes::find($id);
        return view('requisitos_inscripcion',compact('id_aspirante','padres','aspirante','papa','documentos'));
    }

    public function ajax_indicaciones (Request $request)
    {
        $indicaciones=$request->indicaciones;
        $id_aspirante=$request->id_aspirante;
        $editar=Aspirantes::find($id_aspirante);
        $editar->id_grado=$indicaciones;
        $editar->Save();
    }
    public function guardar_firma(Request $request)
    {
        $id = $request->id;
        $img = $request->file('imagen');
        $portafolio = PortafoliosInscripciones::where('id_aspirante', $id)->first();
        \Storage::disk('local')->delete('preregistro/portafolio/' . $id . '/' . $portafolio->pdf_conformidad);
        $ldate = date('Ymd_His_');
        $base1 = base64_encode(file_get_contents($img));
        $base = 'data:image/png;base64,' . $base1;
        $data['base64'] = $base;
        $data['padres'] = Tutores::join('detalle_aspirante_tutores', 'detalle_aspirante_tutores.id_tutor', 'tutores.id_tutor_padre')
        ->where('detalle_aspirante_tutores.id_aspirante', $id)->get();
        $data['aspirante'] = Aspirantes::find($id);
        $path = $ldate . 'oficio_veracidad.pdf';
        $pdf_save = \PDF::loadView('oficio_veracidad', $data)
            ->setPaper('A4', 'portrait')->output();
        \Storage::disk('local')->put('preregistro/portafolio/' . $id . '/' . $path, $pdf_save);
        // Insertar nombre del pdf
        $act = PortafoliosInscripciones::where('id_aspirante', $id)->first();
        $act->pdf_conformidad = $path;
        $act->Save();

        DB::table('aspirantes')->where('id_aspirante',$id)->update(['activo' => 0]); // se actualiza el estado del aspirante para volver a firmar y validar datos

        return response()->json($data);
    }

}
