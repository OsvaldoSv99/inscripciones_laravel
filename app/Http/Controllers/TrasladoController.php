<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirantes;
use App\Models\Tutores;
use App\Models\PortafoliosInscripciones;

class TrasladoController extends Controller
{
    public function guardar_traslado (Request $request, $id)
    {
        // dd($request->all());
        $guardar= Aspirantes::find($id);
        $guardar->nombre_general=$request->nombre_alumno;
        $guardar->curp = $request->curp;
        $guardar->Save();

        $g_papa = Tutores::find($request->id_papa);
        $g_papa->nombre_tutor = $request->nombre_papa;
        $g_papa->edad = $request->edad_papa;
        $g_papa->ocupacion = $request->ocupacion_papa;
        $g_papa->telefono_casa_tutor = $request->telefono_papa;
        $g_papa->email_tutor = $request->email_papa;
        $g_papa->direccion_tutor = $request->direccion_papa;
        $g_papa->grado_estudios = $request->gradoestudios_papa;
        $g_papa->curp = $request->curp_papa;
        $g_papa->Save();

        $g_mama = Tutores::find($request->id_mama);
        $g_mama->nombre_tutor = $request->nombre_mama;
        $g_mama->edad = $request->edad_mama;
        $g_mama->ocupacion = $request->ocupacion_mama;
        $g_mama->telefono_casa_tutor = $request->telefono_mama;
        $g_mama->email_tutor = $request->email_mama;
        $g_mama->direccion_tutor = $request->direccion_mama;
        $g_mama->grado_estudios = $request->gradoestudios_mama;
        $g_mama->curp = $request->curp_mama;
        $g_mama->Save();

        
        $gp = PortafoliosInscripciones::find($id);
        $gp->pdf_translado = date('Ymd_His_') . 'traslado.pdf';
        $gp->Save();


        return back()->with('alta', '.');
    }
}
