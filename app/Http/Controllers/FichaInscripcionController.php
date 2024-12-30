<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirantes;
use App\Models\Tutores;
use App\Models\DetalleAspiranteTutores;
use App\Models\PortafoliosInscripciones;
use App\Models\UsuarioRegistro;
use App\Models\Autorizados;
use App\Models\ContactoEmergencias;
use App\Models\DetalleAutorizadosAspirantes;
use Carbon\Carbon;
use DB;
use Str;
use PDF;

class FichaInscripcionController extends Controller
{
    public function guardar_ficha_inscripcion(Request $request)
    {
        $request->merge(['inicio_clases_fecha' => Carbon::createFromFormat('Y-m-d', $request->input('inicio_clases_fecha'))->format('Y-m-d')]);

        $id = auth()->user()->id;
        $aspirante = Aspirantes::join('grados', 'grados.id_grado', 'aspirantes.id_grado')
            ->join('usuario_registro', 'usuario_registro.id_aspirante', 'aspirantes.id_aspirante')
            ->join('detalle_aspirante_tutores', 'detalle_aspirante_tutores.id_aspirante', 'aspirantes.id_aspirante')
            ->join('tutores', 'tutores.id_tutor_padre', 'detalle_aspirante_tutores.id_tutor')
            ->where('usuario_registro.id_usuario_registro', $id)
            ->groupBy('detalle_aspirante_tutores.id_detalle_aspirante_tutores')
            ->get();
        $count = count($aspirante);

        // Obtener los nombres de los archivos que van a ser insertados
        $ldate = date('Ymd_His_');
        $foto_nino = $request->file('foto_nino');
        $archivo1 = Str::random(7);
        $archivo1 = $ldate . $archivo1 . '.' . $foto_nino->getClientOriginalExtension();

        // nuevos tutores
        if ($count == 0) {
            $foto_mama = $request->file('foto_mama');
            $archivo2 = Str::random(7);
            $archivo2 = $ldate . $archivo2 . '.' . $foto_mama->getClientOriginalExtension();

            if (!isset($request->repetir_tutor)) {
                $foto_papa = $request->file('foto_papa');
                $archivo3 = Str::random(7);
                $archivo3 = $ldate . $archivo3 . '.' . $foto_papa->getClientOriginalExtension();
            }
        }

        // nuevos autorizados
        if (!empty($request->cambiar_autorizados) || $count == 0) {
            $foto_1 = $request->file('foto_1');
            $archivo4 = Str::random(7);
            $archivo4 = $ldate . $archivo4 . '.' . $foto_1->getClientOriginalExtension();

            if (isset($request->foto_2)) {
                $foto_2 = $request->file('foto_2');
                $archivo5 = Str::random(7);
                $archivo5 = $ldate . $archivo5 . '.' . $foto_2->getClientOriginalExtension();
            }

            if (isset($request->foto_3)) {
                $foto_3 = $request->file('foto_3');
                $archivo6 = Str::random(7);
                $archivo6 = $ldate . $archivo6 . '.' . $foto_3->getClientOriginalExtension();
            }

            if (isset($request->foto_4)) {
                $foto_4 = $request->file('foto_4');
                $archivo7 = Str::random(7);
                $archivo7 = $ldate . $archivo7 . '.' . $foto_4->getClientOriginalExtension();
            }

            if (isset($request->foto_5)) {
                $foto_5 = $request->file('foto_5');
                $archivo8 = Str::random(7);
                $archivo8 = $ldate . $archivo8 . '.' . $foto_5->getClientOriginalExtension();
            }
        }

        // Obtener el grado dependiendo de la fecha de nacimiento y la fecha de ingreso
        $grado = obtener_grado($request->fecha_nacimiento,$request->inicio_clases_fecha);
        //    Aspirante
        $ga = new Aspirantes();
        $ga->id_pantel =  $request->sucursal;
        $ga->fecha_nacimiento =  $request->fecha_nacimiento;
        $ga->nombre_general =  $request->nombre_nino;
        $ga->inicio_clases =  $request->inicio_clases_fecha;
        $ga->nombre_aspirante =  $request->nombre_nino;
        $ga->condicion_medica =  $request->condicion_medica;
        $ga->alergias_alimentos =  $request->alergia_alimentos;
        $ga->otras_alergias =  $request->otras_alergias;
        $ga->foto_aspirante =  $archivo1;
        $ga->id_grado =  $grado['grado'];
        $ga->fecha_registro =  Carbon::now()->format('Y-m-d');
        $ga->persona_autorizada =  $request->persona_autorizada;
        $ga->ciclo_escolar =  $request->ciclo_escolar;
        $ga->Save();

        $max = Aspirantes::max('id_aspirante');
        // Guardar los archivos en la carpeta dependiendo del id del aspirante
        \Storage::disk('local')->put('preregistro/imagenes/' . $max . '/' . $archivo1, \File::get($foto_nino));

        // Cambiar permisos de la carpeta
        $ruta_imagen = public_path("storage/preregistro/imagenes/" . $max);

        // Guardar tutores nuevos
        if (!empty($request->cambiar_tutores) || $count == 0) {

            //TUTOR MAMA
            $gt = new Tutores();
            $gt->nombre_tutor =  $request->nombre_mama;
            $gt->telefono_casa_tutor =  $request->telefono1_mama;
            $gt->telefono_trabajo_tutor =  $request->telefono2_mama;
            $gt->celular_tutor =  $request->celular_mama;
            $gt->direccion_tutor =  $request->direccion_mama;
            $gt->email_tutor =  $request->email_mama;
            $gt->foto_tutor =  $archivo2;
            $gt->finalizo_inscripcion =  1;
            $gt->sexo =  2;
            $gt->activo = 1;
            $gt->Save();

            $max_tutor2 = Tutores::max('id_tutor_padre');

            $gdt = new DetalleAspiranteTutores();
            $gdt->id_tutor = $max_tutor2;
            $gdt->id_aspirante = $max;
            $gdt->token = $max . '/1/' . $max_tutor2;
            $gdt->Save();

            \Storage::disk('local')->put('preregistro/tutores/' . $max_tutor2 . '/' . $archivo2, \File::get($foto_mama));
            // Cambiar permisos de la carpeta
            $ruta_mama = public_path("storage/preregistro/tutores/" . $max_tutor2);

            // Validar que este solo sea un tutor
            if (!isset($request->repetir_tutor)) {

                // TUTOR PAPA
                $gt2 = new Tutores();
                $gt2->nombre_tutor = $request->nombre_papa;
                $gt2->telefono_casa_tutor = $request->telefono1_papa;
                $gt2->telefono_trabajo_tutor = $request->telefono2_papa;
                $gt2->celular_tutor = $request->celular_papa;
                $gt2->direccion_tutor = $request->direccion_papa;
                $gt2->email_tutor = $request->email_papa;
                $gt2->foto_tutor = $archivo3;
                $gt2->finalizo_inscripcion = 1;
                $gt2->sexo = 1;
                $gt2->activo = 1;
                $gt2->Save();

                $max_tutor1 = Tutores::max('id_tutor_padre');
                $gdt2 = new DetalleAspiranteTutores();
                $gdt2->id_tutor = $max_tutor1;
                $gdt2->id_aspirante = $max;
                $gdt2->token = $max . '/1/' . $max_tutor1;
                $gdt2->Save();
                
                \Storage::disk('local')->put('preregistro/tutores/' . $max_tutor1 . '/' . $archivo3, \File::get($foto_papa));
                // Cambiar permisos de la carpeta
                $ruta_papa = public_path("storage/preregistro/tutores/" . $max_tutor1);
            } else {
                // Duplicar tutor 1
                $gdtd = new DetalleAspiranteTutores();
                $gdtd->id_tutor = $max_tutor2;
                $gdtd->id_aspirante = $max;
                $gdtd->token = $max . '/1/' . $max_tutor2;
                $gdtd->Save();
                
            }

            // Guardar tutores ya existentes
        } else {
            // filtrar ids de los papás
            $tutorpadre = $aspirante[0]->id_tutor_padre;
            $tutormadre = $aspirante[1]->id_tutor_padre;

            $gd = new DetalleAspiranteTutores();
            $gd->id_tutor = $tutorpadre;
            $gd->id_aspirante = $max;
            $gd->token = $max . '/1/' . $tutorpadre;
            $gd->Save();

            $gd1 = new DetalleAspiranteTutores();
            $gd1->id_tutor = $tutormadre;
            $gd1->id_aspirante = $max;
            $gd1->token = $max . '/1/' . $tutormadre;
            $gd1->Save();
            
        }

        if (!empty($request->cambiar_autorizados) || $count == 0) {
            //Autorizados
            $gau = new Autorizados();
            $gau->nombre_autorizado = $request->nombre_1;
            $gau->parentesco = $request->parentesco_1;
            $gau->foto_pariente = $archivo4;
            $gau->save();
            $max_autorizado1 = Autorizados::max('id_autorizado');

            $gda = new DetalleAutorizadosAspirantes();
            $gda->id_autorizado = $max_autorizado1;
            $gda->id_aspirante = $max;
            $gda->token = $max . '/2/' . $max_autorizado1;
            $gda->save();

            if (isset($request->foto_2)) {
                $ga2 = new Autorizados();
                $ga2->nombre_autorizado = $request->nombre_2;
                $ga2->parentesco = $request->parentesco_2;
                $ga2->foto_pariente = $archivo5;
                $ga2->Save();
            
                $max_autorizado2 = Autorizados::max('id_autorizado');
                $gda2 = new DetalleAutorizadosAspirantes();
                $gda2->id_autorizado = $max_autorizado2;
                $gda2->id_aspirante = $max;
                $gda2->token = $max . '/2/' . $max_autorizado2;
                $gda2->Save();

                \Storage::disk('local')->put('preregistro/autorizados/' . $max_autorizado2 . '/' . $archivo5, \File::get($foto_2));
                // Cambiar permisos de la carpeta
                $ruta_aut2 = public_path("storage/preregistro/autorizados/" . $max_autorizado2);
            }

            if (isset($request->foto_3)) {
                $ga3 = new Autorizados();
                $ga3->nombre_autorizado = $request->nombre_3;
                $ga3->parentesco = $request->parentesco_3;
                $ga3->foto_pariente = $archivo6;
                $ga3->Save();

                $max_autorizado3 = Autorizados::max('id_autorizado');
                $gda3 = new DetalleAutorizadosAspirantes();
                $gda3->id_autorizado = $max_autorizado3;
                $gda3->id_aspirante = $max;
                $gda3->token = $max . '/2/' . $max_autorizado3;
                $gda3->Save();

                \Storage::disk('local')->put('preregistro/autorizados/' . $max_autorizado3 . '/' . $archivo6, \File::get($foto_3));
                // Cambiar permisos de la carpeta
                $ruta_aut3 = public_path("storage/preregistro/autorizados/" . $max_autorizado3);
            }

            if (isset($request->foto_4)) {
                $ga4 = new Autorizados();
                $ga4->nombre_autorizado = $request->nombre_4;
                $ga4->parentesco = $request->parentesco_4;
                $ga4->foto_pariente = $archivo7;
                $ga4->Save();

                $max_autorizado4 = Autorizados::max('id_autorizado');
                $gda4 = new DetalleAutorizadosAspirantes();
                $gda4->id_autorizado = $max_autorizado4;
                $gda4->id_aspirante = $max;
                $gda4->token = $max . '/2/' . $max_autorizado4;
                $gda4->Save();

                \Storage::disk('local')->put('preregistro/autorizados/' . $max_autorizado4 . '/' . $archivo7, \File::get($foto_4));
                // Cambiar permisos de la carpeta
                $ruta_aut4 = public_path("storage/preregistro/autorizados/" . $max_autorizado4);
            }

            if (isset($request->foto_5)) {
                $ga5 = new Autorizados();
                $ga5->nombre_autorizado = $request->nombre_5;
                $ga5->parentesco = $request->parentesco_5;
                $ga5->foto_pariente = $archivo8;
                $ga5->Save();

                $max_autorizado5 = Autorizados::max('id_autorizado');
                $gda5 = new DetalleAutorizadosAspirantes();
                $gda5->id_autorizado = $max_autorizado5;
                $gda5->id_aspirante = $max;
                $gda5->token = $max . '/2/' . $max_autorizado5;
                $gda5->Save();

                \Storage::disk('local')->put('preregistro/autorizados/' . $max_autorizado5 . '/' . $archivo8, \File::get($foto_5));
                // Cambiar permisos de la carpeta
                $ruta_aut5 = public_path("storage/preregistro/autorizados/" . $max_autorizado5);
            }

            \Storage::disk('local')->put('preregistro/autorizados/' . $max_autorizado1 . '/' . $archivo4, \File::get($foto_1));
            // Cambiar permisos de la carpeta
            $ruta_aut1 = public_path("storage/preregistro/autorizados/" . $max_autorizado1);
        } else {
            $autorizados = Autorizados::join('detalle_autorizados_aspirantes', 'detalle_autorizados_aspirantes.id_autorizado', 'autorizados.id_autorizado')
                ->where('detalle_autorizados_aspirantes.id_aspirante', $aspirante[0]->id_aspirante)
                ->select('detalle_autorizados_aspirantes.id_autorizado')
                ->get();

            foreach ($autorizados as $key => $value) {
                $gdad = new DetalleAutorizadosAspirantes();
                $gdad->id_autorizado = $value->id_autorizado;
                $gdad->id_aspirante = $max;
                $gdad->token = $max . '/2/' . $value->id_autorizado;
                $gdad->Save();
            }
        }
        // CONTACTO EMERGENCIAS
        $gce = new ContactoEmergencias();
        $gce->nombre_persona = $request->nombre_emergencia;
        $gce->telefono_casa = $request->telefono1_emergencia;
        $gce->telefono_trabajo = $request->telefono2_emergencia;
        $gce->celular = $request->celular_emergencia;
        $gce->parentesco = $request->parentesco_contacto;
        $gce->id_aspirante = $max;
        $gce->activo = 1;
        $gce->Save();

        // Insertar nombre del pdf
        $gp = new PortafoliosInscripciones();
        $gp->id_aspirante = $max;
        $gp->pdf_inscripcion = $ldate . 'ficha_inscripcion.pdf';;
        $gp->Save();

        $gur = new UsuarioRegistro();
        $gur->id_aspirante = $max;
        $gur->id_usuario_registro = auth()->user()->id;
        $gur->Save();

        return back()->with('alta', '.');
    }
}
