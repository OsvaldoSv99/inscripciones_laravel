<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirantes;

class RequisitosController extends Controller
{
    public function guardar_documentos(Request $request,$id)
    {
        $aspirante=Aspirantes::find($id);
        $date = date('Ymd-His-');
        $portafolio=Preregistros::where('id_aspirante',$id)->first();
        
        if (!empty($request->file('archivo_acta'))) {
            \Storage::disk('local')->delete('/documentos/'.$id.'/'.$portafolio->acta_nacimiento);
            $archivo_acta=$request->file('archivo_acta');
            $archivo5 = $archivo_acta->getClientOriginalName();
            $archivo5 = $date.$archivo5;
            \Storage::disk('local')->put('/documentos/'.$id.'/' . $archivo5, \File::get($archivo_acta));
        }
     
        if (!empty($request->file('archivo_acta_t1'))) {
            \Storage::disk('local')->delete('/documentos/'.$id.'/'.$portafolio->acta_nacimiento_t1);
            $archivo_acta_t1=$request->file('archivo_acta_t1');
            $archivo6 = $archivo_acta_t1->getClientOriginalName();
            $archivo6 = $date.$archivo6;
            \Storage::disk('local')->put('/documentos/'.$id.'/' . $archivo6, \File::get($archivo_acta_t1));
        }
       
        if (!empty($request->file('archivo_acta_t2'))) {
            \Storage::disk('local')->delete('/documentos/'.$id.'/'.$portafolio->acta_nacimiento_t2);
            $archivo_acta_t2=$request->file('archivo_acta_t2');
            $archivo7 = $archivo_acta_t2->getClientOriginalName();
            $archivo7 = $date.$archivo7;
            \Storage::disk('local')->put('/documentos/'.$id.'/' . $archivo7, \File::get($archivo_acta_t2));
        }

        if (!empty($request->file('archivo_certificado'))) {
            \Storage::disk('local')->delete('/documentos/'.$id.'/'.$portafolio->certificado_medico);
            $archivo_certificado=$request->file('archivo_certificado');
            $archivo8 = $archivo_certificado->getClientOriginalName();
            $archivo8 = $date.$archivo8;
            \Storage::disk('local')->put('/documentos/'.$id.'/' . $archivo8, \File::get($archivo_certificado));
        }

        if (!empty($request->file('archivo_cartilla'))) {
            \Storage::disk('local')->delete('/documentos/'.$id.'/'.$portafolio->cartilla_vacunacion);
            $archivo_cartilla=$request->file('archivo_cartilla');
            $archivo9 = $archivo_cartilla->getClientOriginalName();
            $archivo9 = $date.$archivo9;
            \Storage::disk('local')->put('/documentos/'.$id.'/' . $archivo9, \File::get($archivo_cartilla));
        }

        if (!empty($request->file('archivo_identificacion_t1'))) {
            \Storage::disk('local')->delete('/documentos/'.$id.'/'.$portafolio->identificacion_oficial_t1);
            $archivo_identificacion_t1=$request->file('archivo_identificacion_t1');
            $archivo10 = $archivo_identificacion_t1->getClientOriginalName();
            $archivo10 = $date.$archivo10;
            \Storage::disk('local')->put('/documentos/'.$id.'/' . $archivo10, \File::get($archivo_identificacion_t1));
        }
       
        if (!empty($request->file('archivo_identificacion_t2'))) {
            \Storage::disk('local')->delete('/documentos/'.$id.'/'.$portafolio->identificacion_oficial_t2);
            $archivo_identificacion_t2=$request->file('archivo_identificacion_t2');
            $archivo11 = $archivo_identificacion_t2->getClientOriginalName();
            $archivo11 = $date.$archivo11;
            \Storage::disk('local')->put('/documentos/'.$id.'/' . $archivo11, \File::get($archivo_identificacion_t2));
        }

        if (!empty($request->file('archivo_curp_alumno'))) {
            \Storage::disk('local')->delete('/documentos/'.$id.'/'.$portafolio->curp);
            $archivo_curp_alumno=$request->file('archivo_curp_alumno');
            $archivo12 = $archivo_curp_alumno->getClientOriginalName();
            $archivo12 = $date.$archivo12;
            \Storage::disk('local')->put('/documentos/'.$id.'/' . $archivo12, \File::get($archivo_curp_alumno));
        }
        
        if (!empty($request->file('archivo_curp_t1'))) {
            \Storage::disk('local')->delete('/documentos/'.$id.'/'.$portafolio->curp_t1);
            $archivo_curp_t1=$request->file('archivo_curp_t1');
            $archivo13 = $archivo_curp_t1->getClientOriginalName();
            $archivo13 = $date.$archivo13;
            \Storage::disk('local')->put('/documentos/'.$id.'/' . $archivo13, \File::get($archivo_curp_t1));
        }
       
        if (!empty($request->file('archivo_curp_t2'))) {
            \Storage::disk('local')->delete('/documentos/'.$id.'/'.$portafolio->curp_t2);
            $archivo_curp_t2=$request->file('archivo_curp_t2');
            $archivo14 = $archivo_curp_t2->getClientOriginalName();
            $archivo14 = $date.$archivo14;
            \Storage::disk('local')->put('/documentos/'.$id.'/' . $archivo14, \File::get($archivo_curp_t2));
        }
        if (!empty($request->file('otro'))) {
            \Storage::disk('local')->delete('/documentos/'.$id.'/'.$portafolio->otro);
            $otro=$request->file('otro');
            $archivo15 = $otro->getClientOriginalName();
            $archivo15 = $date.$archivo15;
            \Storage::disk('local')->put('/documentos/'.$id.'/' . $archivo15, \File::get($otro));
        }

        $alta=Preregistros::find($portafolio->id_preregistro);
        $alta->id_aspirante=$id;
        if (!empty($request->file('archivo_acta'))) {
        $alta->acta_nacimiento=$archivo5;
        }
        if (!empty($request->file('archivo_acta_t1'))) {
            $alta->acta_nacimiento_t1=$archivo6;
        }
        if (!empty($request->file('archivo_acta_t2'))) {
            $alta->acta_nacimiento_t2=$archivo7;
        }
        if (!empty($request->file('archivo_certificado'))) {
            $alta->certificado_medico=$archivo8;
        }
        if (!empty($request->file('archivo_cartilla'))) {
            $alta->cartilla_vacunacion=$archivo9;
        }
        if (!empty($request->file('archivo_identificacion_t1'))) {
            $alta->identificacion_oficial_t1=$archivo10;
        }
        if (!empty($request->file('archivo_identificacion_t2'))) {
            $alta->identificacion_oficial_t2=$archivo11;
        }
        if (!empty($request->file('archivo_curp_alumno'))) {
            $alta->curp=$archivo12;
        }
        if (!empty($request->file('archivo_curp_t1'))) {
            $alta->curp_t1=$archivo13;
        }
        if (!empty($request->file('archivo_curp_t2'))) {
            $alta->curp_t2=$archivo14;
        }
        if (!empty($request->file('otro'))) {
            $alta->otro=$archivo15;
        }
        $alta->id_grado=$aspirante->id_grado;
        $alta->porcentaje=$request->porcentaje;
        $alta->cuenta_beca=$request->cuenta_beca;
        $alta->Save();

        return redirect()->back()->with('exito','.');
    }
}
