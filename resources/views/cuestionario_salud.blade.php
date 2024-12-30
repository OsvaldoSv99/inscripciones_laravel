<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cuestionario de salud</title>
    <link rel="shortcut icon" href="{{asset('imagenes/logo3.png')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/preregistro/cuestionario_salud.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('js/preregistro/cuestionario.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/datepicker.css')}}">
  </head>
  <body>
    <style>
         @media(min-width:768px){
            .margen_negativo{
                margin-left: -34px;
            }
            .margen_negativo2{
                margin-left: -9px;
            }
       }
    </style>
        {{-- Header --}}
        <div class="header">
            <div class="row col-12 text-center justify-content-center">
                <div class="col-2">
                  <img src="{{asset('imagenes/preregistro/uno.png')}}" alt="" class="imagen_pasos">
                </div>
                <div class="col-2">
                  <img src="{{asset('imagenes/preregistro/dos.png')}}" alt="" class="imagen_pasos">
                </div>
                <div class="col-2">
                  <img src="{{asset('imagenes/preregistro/tres.png')}}" alt="" class="imagen_pasos">
                </div>
                @if ($aspirante->id_grado <= 5)    
                <div class="col-2">
                  <img src="{{asset('imagenes/preregistro/cuatro_candado.png')}}" alt="" class="imagen_pasos">
                </div>
                <div class="col-2">
                  <img src="{{asset('imagenes/preregistro/cinco_candado.png')}}" alt="" class="imagen_pasos">
                </div>
                @else
                <div class="col-2">
                  <img src="{{asset('imagenes/preregistro/cuatro_candado_naranja.png')}}" alt="" class="imagen_pasos">
                </div>
                @endif
              </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-5">
                    <nav style="height: 8px !important">
                        <ol class="breadcrumb">
                          <div>
                              <li class="breadcrumb-item">
                                  <a href="{{url('inicio_aspirante',$id)}}"
                                      style="display:block;margin-bottom:2rem; text-decoration: none; font-weight:bold; color:#144580">
                                      <span style="color:red; font-weight:bold; ">
                                          <svg style="width: 1.5rem;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                              stroke-width="3" stroke="currentColor" >
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                          </svg>
                                      </span> Regresar
                                  </a>
                              </li>
                          </div>
                        </ol>
                    </nav>
                </div>
              </div>
            <form class="needs-validation" novalidate action="{{url('guardar_cuestionario',$id)}}" id="formulario" method="post">
                @csrf
            <h4 class="titulo text-center mt-2">Cuestionario de Salud, Formato de Corresponsabilidad Alumnos</h4>
            <p class="fs-5">Como parte de las medidas de seguridad para la prevención de enfermedades, el retorno seguro a clases y conservación de la sanidad de la comunidad escolar, en Moms And Tots solicitamos a todos los padres de familia responder
                al siguiente cuestionario. La respuesta honesta y responsable es indispensable para la salud de todos.</p>
            <br>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <span class="titulo">Sección 1: Datos personales del alumno</span>
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-sm-2 col-lg-1  text-start">
                              <label class="form-label">Nombre: </label>
                            </div>
                            <div class="col-md-12 col-sm-10 col-lg-11">
                              <input type="text" class="form-control" name="nombre_alumno" value="{{$aspirante->nombre_general}}" readonly required>
                              <small>(Apellido Paterno, Apellido Materno, Nombre(s))</small>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12 col-sm-2 col-lg-1  text-start">
                              <label class="form-label">Fecha de nacimiento: </label>
                            </div>
                            <div class="col-md-12 col-sm-10 col-lg-11">
                              <input type="date" class="form-control" name="fecha_nacimiento" value="{{$aspirante->fecha_nacimiento}}" required readonly>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12 col-sm-2 col-lg-1  text-start">
                              <label class="form-label">Género: </label>
                            </div>
                            <div class="col-md-12 col-sm-10 col-lg-11">
                              <select name="genero_alumno" id="" class="form-select" required>
                                <option hidden>--Selecciona una opción--</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                              </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 col-sm-12 col-lg-4 my-2">
                                <div class="row">
                                    <div class="col-md-12 col-sm-2 col-lg-3 text-start">
                                      <label class="form-label">Calle: </label>
                                    </div>
                                    <div class="col-md-12 col-sm-10 col-lg-9">
                                      <input type="text" class="form-control" name="calle_dom" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-2 my-2">
                                <div class="row">
                                    <div class="col-md-12 col-sm-2 col-lg-3  text-start">
                                      <label class="form-label">No: </label>
                                    </div>
                                    <div class="col-md-12 col-sm-10 col-lg-9">
                                      <input type="text" class="form-control" name="numero_dom" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-3 my-2">
                                <div class="row">
                                    <div class="col-md-12 col-sm-2 text-start col-lg-3">
                                      <label class="form-label">Colonia: </label>
                                    </div>
                                    <div class="col-md-12 col-sm-10 col-lg-9">
                                      <input type="text" class="form-control" name="colonia_dom" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-3 my-2">
                                <div class="row">
                                    <div class="col-md-12 col-sm-2 col-lg-4  text-start">
                                      <label class="form-label">Localidad: </label>
                                    </div>
                                    <div class="col-md-12 col-sm-10 col-lg-8">
                                      <input type="text" class="form-control" name="localidad_dom" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-2 col-lg-1  text-start">
                              <label class="form-label">Grupo: </label>
                            </div>
                            <div class="col-md-12 col-sm-10 col-lg-11">
                              <input type="text" class="form-control" name="grupo" value="{{$aspirante->nombre}}" required readonly>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <span class="titulo">Sección 2: Datos médicos del alumno</span>
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-1 col-sm-2  text-start">
                                  <label class="form-label">Tipo de sangre: </label>
                                </div>
                                <div class="col-md-11 col-sm-10">
                                  <input type="text" class="form-control" name="tipo_sangre" required>
                                </div>
                            </div>
                            <strong>Alergias</strong>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 mt-2">
                                    <div class="row align-items-center">
                                    <div class="col-2 col-md-1 text-start">
                                    <input type="checkbox" class="form-check-input check_alimento" name="check_alimento" >
                                    </div>
                                    <div class="col-5 col-md-4">
                                    <label class="form-label">Alimentos (especificar) </label>
                                    </div>
                                    <div class="col-5 col-md-7">
                                    <input type="text" class="form-control" name="alergia_alimentos" readonly>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12  mt-2">
                                    <div class="row align-items-center">
                                    <div class="col-2 col-md-1 text-start">
                                    <input type="checkbox" class="form-check-input" name="check_animales">
                                    </div>
                                    <div class="col-5 col-md-5">
                                    <label class="form-label">Animales/Insectos (especificar) </label>
                                    </div>
                                    <div class="col-5 col-md-6">
                                    <input type="text" class="form-control" name="alergia_animales" readonly>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12  mt-2">
                                    <div class="row align-items-center">
                                    <div class="col-2 col-md-1 text-start">
                                    <input type="checkbox" class="form-check-input" name="check_medicamentos">
                                    </div>
                                    <div class="col-5 col-md-4">
                                    <label class="form-label">Medicamentos (especificar) </label>
                                    </div>
                                    <div class="col-5 col-md-7">
                                    <input type="text" class="form-control" name="alergia_medicamentos" readonly>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mt-2">
                                    <div class="row align-items-center">
                                    <div class="col-2 col-md-1 text-start">
                                    <input type="checkbox" class="form-check-input" name="check_ambiente">
                                    </div>
                                    <div class="col-5 col-md-5">
                                    <label class="form-label">Agentes ambientales (especificar) </label>
                                    </div>
                                    <div class="col-5 col-md-6">
                                    <input type="text" class="form-control" name="alergia_ambiente" readonly>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 mt-2">
                                    <div class="row align-items-center">
                                        <div class="col-2 col-md-1 text-start">
                                            <input type="checkbox" class="form-check-input" name="check_otroalergia">
                                        </div>
                                        <div class="col-5 col-md-4">
                                            <label class="form-label">Otro (especificar) </label>
                                        </div>
                                        <div class="col-5 col-md-7">
                                            <input type="text" class="form-control" name="alergia_otro" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mt-2">
                                    <div class="row align-items-center">
                                        <div class="col-2 col-md-1 text-start">
                                            <input type="checkbox" class="form-check-input" name="check_ningunoalergia">
                                        </div>
                                        <div class="col-5 col-md-11">
                                            <label class="form-label">Ninguno</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3">¿Cuenta con su cartilla de vacunación completa?</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-1 col-md-1 ">
                                            <input type="radio" class="form-check-input" name="vacunacion" value="1" checked>
                                        </div>
                                        <div class="col-4 col-md-4">
                                            <label class="form-label">Si </label>
                                        </div>
                                        <div class="col-1 col-md-1">
                                            <input type="radio" class="form-check-input" name="vacunacion" value="0">
                                        </div>
                                        <div class="col-4 col-md-4">
                                            <label class="form-label">No </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <div class="row">
                                    <div class="col-md-4 col-sm-5">
                                    <label class="form-label">¿Cuáles vacunas están pendientes?: </label>
                                    </div>
                                    <div class="col-md-8 col-sm-5">
                                    <input type="text" class="form-control" name="vacunas_pendientes" readonly>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3">Tratamientos o ingesta de medicamentos crónicos</p>
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="radio" class="form-check-input" name="medicamentos_cro" value="1" >
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">Si </label>
                                        </div>
                                        <div class="col-1">
                                            <input type="radio" class="form-check-input" name="medicamentos_cro" value="0" checked>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">No </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <div class="row">
                                    <div class="col-md-4 col-sm-5">
                                    <label class="form-label">Especifique: </label>
                                    </div>
                                    <div class="col-md-8 col-sm-5">
                                    <input type="text" class="form-control" name="medicamentos_cronicos" readonly >
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3">¿Ha sido vacunado contra el SARS COV-2?</p>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="radio" class="form-check-input" name="vacuna_covid" value="Si" checked>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">Si </label>
                                        </div>
                                        <div class="col-1">
                                            <input type="radio" class="form-check-input" name="vacuna_covid" value="No">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">No </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3">Condiciones físicas: </p>
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="row align-items-center m-0 ">
                                        <div class="col-2 col-md-1 ">
                                            <input type="checkbox" class="form-check-input" name="migrana_al">
                                        </div>
                                        <div class="col-4 col-md-4">
                                            <label class="form-label">Migraña </label>
                                        </div>
                                        <div class="col-2 col-md-1">
                                            <input type="checkbox" class="form-check-input" name="hipertension_al">
                                        </div>
                                        <div class="col-4 col-md-4">
                                            <label class="form-label">Hipertesión</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <div class="row align-items-center m-0">
                                    <div class="col-2 col-md-1 text-start">
                                    <input type="checkbox" class="form-check-input" name="otro_condiciones_al">
                                    </div>
                                    <div class="col-5 col-md-3">
                                    <label class="form-label">Otro (especificar) </label>
                                    </div>
                                    <div class="col-5 col-md-8">
                                    <input type="text" class="form-control" name="condiciones_al_otro" readonly>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row align-items-center">
                                    <div class="col-2 col-md-1 ">
                                        <input type="checkbox" class="form-check-input" name="diabetes_al">
                                    </div>
                                    <div class="col-4 col-md-4 ">
                                        <label class="form-label">Diabetes </label>
                                    </div>
                                    <div class="col-2 col-md-1">
                                        <input type="checkbox" class="form-check-input" name="obesidad_al">
                                    </div>
                                    <div class="col-4 col-md-4 ">
                                        <label class="form-label">Obesidad</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row align-items-center">
                                    <div class="col-2 col-md-1 ">
                                        <input type="checkbox" class="form-check-input" name="miopia_al">
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <label class="form-label">Miopía </label>
                                    </div>
                                    <div class="col-2 col-md-1">
                                        <input type="checkbox" class="form-check-input" name="astigmatismo_al">
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <label class="form-label">Astigmatismo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row align-items-center">
                                    <div class="col-2 col-md-1 ">
                                        <input type="checkbox" class="form-check-input" name="epilepsia_al">
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <label class="form-label">Epilepsia </label>
                                    </div>
                                    <div class="col-2 col-md-1">
                                        <input type="checkbox" class="form-check-input" name="ninguna_al">
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <label class="form-label">Ninguna</label>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3">Discapacidad: </p>
                            <div class="col-md-6 col-sm-12">
                                <div class="row align-items-center">
                                    <div class="col-2 col-md-1 ">
                                        <input type="checkbox" class="form-check-input" name="motriz_al">
                                    </div>
                                    <div class="col-4 col-md-3">
                                        <label class="form-label">Motriz </label>
                                    </div>
                                    <div class="col-2 col-md-1">
                                        <input type="checkbox" class="form-check-input" name="visual_al">
                                    </div>
                                    <div class="col-4 col-md-3">
                                        <label class="form-label">Visual</label>
                                    </div>
                                    <div class="col-2 col-md-1">
                                        <input type="checkbox" class="form-check-input" name="ninguna_dis_al">
                                    </div>
                                    <div class="col-4 col-md-3">
                                        <label class="form-label">Ninguna</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="row align-items-center m-0">
                                        <div class="col-2 col-md-1">
                                            <input type="checkbox" class="form-check-input" name="neurologica_al">
                                        </div>
                                        <div class="col-4 col-md-5">
                                            <label class="form-label">Neurológica </label>
                                        </div>
                                        <div class="col-2 col-md-1">
                                            <input type="checkbox" class="form-check-input" name="auditiva_al">
                                        </div>
                                        <div class="col-4 col-md-3">
                                            <label class="form-label">Auditiva</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <div class="row align-items-center  m-0">
                                        <div class="col-2 col-md-1 text-start">
                                            <input type="checkbox" class="form-check-input" name="otra_al_discapacidad">
                                        </div>
                                        <div class="col-5 col-md-3">
                                            <label class="form-label">Otro (especificar)</label>
                                        </div>
                                        <div class="col-5 col-md-8">
                                            <input type="text" class="form-control" name="discapacidad_al_otra" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <span class="titulo">Sección 3: Contacto de emergencia (diferente a padres/tutores)</span>
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="row align-items-center mt-2">
                                <div class="col-md-12 col-sm-2 col-lg-1  text-start">
                                  <label class="form-label">Nombre: </label>
                                </div>
                                <div class="col-md-12 col-sm-10 col-lg-11 text-start">
                                  <input type="text" class="form-control" name="nombre_emergencia" value="{{$emergencia->nombre_persona}}" required>
                                  <small>(Apellido Paterno, Apellido Materno, Nombre(s))</small>
                                </div>
                              </div>
                            <div class="row align-items-center mt-2">
                                <div class="col-md-12 col-sm-2 col-lg-1  text-start">
                                  <label class="form-label">Parentesco: </label>
                                </div>
                                <div class="col-md-12 col-sm-10 col-lg-11">
                                  <input type="text" class="form-control" name="parentesco_emergencia" required value="{{$emergencia->parentesco}}">
                                </div>
                              </div>
                            <div class="row align-items-center mt-2">
                                <div class="col-md-12 col-sm-2 col-lg-1  text-start">
                                  <label class="form-label">Teléfonos: </label>
                                </div>
                                <div class="col-md-6 col-sm-5 col-lg-5 my-1">
                                  <input type="number" class="form-control" id="telefono1_emergencia" name="telefono1_emergencia" value="{{$emergencia->telefono_trabajo}}">
                                </div>
                                <div class="col-md-6 col-sm-5 col-lg-6 my-1">
                                  <input type="number" class="form-control" id="telefono2_emergencia" name="telefono2_emergencia" value="{{$emergencia->telefono_casa}}">
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      <span class="titulo">Sección 4: Tutores</span>
                    </button>
                  </h2>
                  <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <input type="hidden" value="{{$padre[0]->id_tutor_padre}}" name="id_papa">
                    <input type="hidden" value="{{$padre[1]->id_tutor_padre}}" name="id_mama">
                    <div class="accordion-body">
                        <div class="container">
                            <p>Tutor 1</p>
                            <div class="row align-items-center">
                                <div class="col-md-12 col-sm-2 col-lg-1  text-start">
                                  <label class="form-label">Nombre: </label>
                                </div>
                                <div class="col-md-12 col-sm-10 col-lg-11 text-start">
                                  <input type="text" class="form-control" name="nombre_t1" value="{{$padre[0]->nombre_tutor}}" required readonly>
                                  <small>(Apellido Paterno, Apellido Materno, Nombre(s))</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 col-sm-12 my-2 text-start">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-2 col-lg-2 text-start">
                                            <label class="form-label">Parentesco: </label>
                                        </div>
                                        <div class="col-md-12 col-sm-10 col-lg-10">
                                            <select name="parentesco_t1" id="" class="form-select">
                                              <option value="Papá" {{$padre[0]->parentesco == 'Papá' ? 'selected' : ''}}>Papá</option>
                                              <option value="Mamá" {{$padre[0]->parentesco == 'Mamá' ? 'selected' : ''}}>Mamá</option>
                                              <option value="Abuelo" {{$padre[0]->parentesco == 'Abuelo' ? 'selected' : ''}}>Abuelo</option>
                                              <option value="Abuela" {{$padre[0]->parentesco == 'Abuela' ? 'selected' : ''}}>Abuela</option>
                                              <option value="Tio" {{$padre[0]->parentesco == 'Tio' ? 'selected' : ''}}>Tio</option>
                                              <option value="Tia" {{$padre[0]->parentesco == 'Tia' ? 'selected' : ''}}>Tia</option>
                                              <option value="Hermano" {{$padre[0]->parentesco == 'Hermano' ? 'selected' : ''}}>Hermano</option>
                                              <option value="Hermana" {{$padre[0]->parentesco == 'Hermana' ? 'selected' : ''}}>Hermana</option>
                                              <option value="Primo" {{$padre[0]->parentesco == 'Primo' ? 'selected' : ''}}>Primo</option>
                                              <option value="Prima" {{$padre[0]->parentesco == 'Prima' ? 'selected' : ''}}>Prima</option>
                                            </select>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-sm-12 my-2">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-2 col-lg-2  text-start">
                                            <label class="form-label">Fecha de nacimiento: </label>
                                        </div>
                                        <div class="col-md-12 col-sm-10 col-lg-10">
                                            <input type="text" class="form-control datepicker" name="fecha_nacimiento_t1" required value="{{ !is_null($padre[1]->fecha_nacimiento) ? date('d/m/Y', strtotime($padre[0]->fecha_nacimiento)) : '' }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 col-sm-12">
                                    <div class="row my-2">
                                        <div class="col-2 col-md-12 col-lg-2">
                                            <label class="form-label">Ocupación: </label>
                                        </div>
                                        <div class="col-lg-10 col-sm-10 col-md-12">
                                           <input type="text" class="form-control" name="ocupacion_t1" required value="{{$padre[0]->ocupacion}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-sm-12">
                                    <div class="row my-2">
                                        <div class="col-2 col-md-12 col-lg-2">
                                            <label class="form-label">Teléfono: </label>
                                        </div>
                                        <div class="col-lg-10 col-sm-10 col-md-12">
                                          <input type="number" class="form-control" id="telefono_t1" name="telefono_t1" value="{{$padre[0]->telefono_casa_tutor}}">
                                          <input type="hidden" class="form-control" id="telefono_trabajo_t1" name="telefono_trabajo_t1" value="{{$padre[0]->telefono_trabajo_tutor}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3">¿Ha sido vacunado contra el SARS COV-2?</p>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row align-items-center">
                                        <div class="col-1">
                                            <input type="radio" class="form-check-input" name="vacuna_covid_t1" value="1" {{$countpadre != 0 ? $condicion_padre[0]->vacuna_covid == 1 ? 'checked': '' : 'checked'}}>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">Si </label>
                                        </div>
                                        <div class="col-1">
                                            <input type="radio" class="form-check-input" name="vacuna_covid_t1" value="0" {{$countpadre != 0 ? $condicion_padre[0]->vacuna_covid == 0 ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">No </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>Condiciones físicas</p>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="migraña_t1" {{$countpadre != 0 ? $condiciones_fisicas1[0]['migrana'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Migraña </label>
                                        </div>
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="hipertension_t1" {{$countpadre != 0 ? $condiciones_fisicas1[0]['hipertension'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Hipertesión</label>
                                        </div>
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="embarazo_t1" {{$countpadre != 0 ? $condiciones_fisicas1[0]['embarazo'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Embarazo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="row my-1">
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="diabetes_t1" {{$countpadre != 0 ? $condiciones_fisicas1[0]['diabetes'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Diabetes </label>
                                        </div>
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="obesidad_t1" {{$countpadre != 0 ? $condiciones_fisicas1[0]['obesidad'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Obesidad</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="row my-1">
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="otro_condicion_t1" {{$countpadre != 0 ? $condiciones_fisicas1[0]['otro'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Otro(especificar):</label>
                                        </div>
                                        <div class="col-5">
                                            <input type="text" class="form-control" name="condicion_t1" {{$countpadre != 0 ? $condiciones_fisicas1[0]['otro'] != '' ? '': 'readonly' : ''}} value="{{$countpadre != 0 ? $condicion_padre[0]->otra_condicion : ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="miopia_t1" {{$countpadre != 0 ? $condiciones_fisicas1[0]['miopia'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Miopía </label>
                                        </div>
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="astigmatismo_t1" {{$countpadre != 0 ? $condiciones_fisicas1[0]['astigmatismo'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Astigmatismo</label>
                                        </div>
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="ninguno_t1" {{$countpadre != 0 ? $condiciones_fisicas1[0]['ninguno'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Ninguno</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="epilepsia_t1" {{$countpadre != 0 ? $condiciones_fisicas1[0]['epilepsia'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Epilepsia </label>
                                        </div>
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="fumador_t1" {{$countpadre != 0 ? $condiciones_fisicas1[0]['fumador'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Fumador</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3">Tutor 2</p>
                            <div class="row">
                                <div class="col-md-12 col-sm-2 col-lg-1">
                                  <label class="form-label">Nombre: </label>
                                </div>
                                <div class="col-md-12 col-sm-10 col-lg-11 text-start">
                                  <input type="text" class="form-control" name="nombre_t2" value="{{$padre[1]->nombre_tutor}}" required readonly>
                                  <small>(Apellido Paterno, Apellido Materno, Nombre(s))</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="row my-2">
                                        <div class="col-md-12 col-sm-2 col-lg-2  text-start">
                                        <label class="form-label">Parentesco: </label>
                                        </div>
                                        <div class="col-md-12 col-sm-10 col-lg-10">
                                        <select name="parentesco_t2" id="" class="form-select">
                                            <option value="Papá" {{$padre[1]->parentesco == 'Papá' ? 'selected' : ''}}>Papá</option>
                                            <option value="Mamá" {{$padre[1]->parentesco == 'Mamá' ? 'selected' : ''}}>Mamá</option>
                                            <option value="Abuelo" {{$padre[1]->parentesco == 'Abuelo' ? 'selected' : ''}}>Abuelo</option>
                                            <option value="Abuela" {{$padre[1]->parentesco == 'Abuela' ? 'selected' : ''}}>Abuela</option>
                                            <option value="Tio" {{$padre[1]->parentesco == 'Tio' ? 'selected' : ''}}>Tio</option>
                                            <option value="Tia" {{$padre[1]->parentesco == 'Tia' ? 'selected' : ''}}>Tia</option>
                                            <option value="Hermano" {{$padre[1]->parentesco == 'Hermano' ? 'selected' : ''}}>Hermano</option>
                                            <option value="Hermana" {{$padre[1]->parentesco == 'Hermana' ? 'selected' : ''}}>Hermana</option>
                                            <option value="Primo" {{$padre[1]->parentesco == 'Primo' ? 'selected' : ''}}>Primo</option>
                                            <option value="Prima" {{$padre[1]->parentesco == 'Prima' ? 'selected' : ''}}>Prima</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="row my-2">
                                        <div class="col-md-12 col-sm-2 col-lg-2">
                                            <label class="form-label">Fecha de nacimiento: </label>
                                        </div>
                                        <div class="col-md-12 col-sm-10 col-lg-10">
                                            <input type="text" class="form-control datepicker" name="fecha_nacimiento_t2" required value="{{ !is_null($padre[1]->fecha_nacimiento) ? date('d/m/Y', strtotime($padre[1]->fecha_nacimiento)) : '' }}" autocomplete="off">
                                          </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="row my-2">
                                        <div class="col-md-12 col-sm-2 col-lg-2">
                                            <label class="form-label">Ocupación: </label>
                                        </div>
                                        <div class="col-md-12 col-sm-10 col-lg-10">
                                            <input type="text" class="form-control" name="ocupacion_t2" required value="{{$padre[1]->ocupacion}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="row my-2">
                                        <div class="col-md-12 col-sm-2 col-lg-2">
                                            <label class="form-label">Teléfono: </label>
                                          </div>
                                        <div class="col-md-12 col-sm-10 col-lg-10">
                                          <input type="number" class="form-control" id="telefono_t2" name="telefono_t2" value="{{$padre[1]->telefono_casa_tutor}}">
                                          <input type="hidden" class="form-control" id="telefono_trabajo_t2" name="telefono_trabajo_t2" value="{{$padre[1]->telefono_trabajo_tutor}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3">¿Ha sido vacunado contra el SARS COV-2?</p>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="radio" class="form-check-input" name="vacuna_covid_t2" value="1" {{$countmadre != 0 ? $condicion_madre[0]->vacuna_covid == 1 ? 'checked': '' : 'checked'}}>
                                        </div>
                                        <div class="col-4 col-md-3">
                                            <label class="form-label">Si </label>
                                        </div>
                                        <div class="col-1">
                                            <input type="radio" class="form-check-input" name="vacuna_covid_t2" value="0" {{$countmadre != 0 ? $condicion_madre[0]->vacuna_covid == 1 ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">No </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>Condiciones físicas</p>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="migraña_t2" {{$countmadre != 0 ? $condiciones_fisicas2[0]['migrana'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Migraña </label>
                                        </div>
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="hipertension_t2" {{$countmadre != 0 ? $condiciones_fisicas2[0]['hipertension'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Hipertesión</label>
                                        </div>
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="embarazo_t2" {{$countmadre != 0 ? $condiciones_fisicas2[0]['embarazo'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Embarazo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="diabetes_t2" {{$countmadre != 0 ? $condiciones_fisicas2[0]['diabetes'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Diabetes </label>
                                        </div>
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="obesidad_t2" {{$countmadre != 0 ? $condiciones_fisicas2[0]['obesidad'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Obesidad</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="row my-1">
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="otro_condicion_t2" {{$countmadre != 0 ? $condiciones_fisicas2[0]['otro'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-4 col-md-3">
                                            <label class="form-label">Otro(especificar):</label>
                                        </div>
                                        <div class="col-5">
                                            <input type="text" class="form-control" name="condicion_t2" {{$countmadre != 0 ? $condiciones_fisicas2[0]['otro'] != '' ? '': 'readonly' : ''}}  value="{{$countmadre != 0 ? $condicion_madre[0]->otra_condicion : '' }}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="miopia_t2" {{$countmadre != 0 ? $condiciones_fisicas2[0]['miopia'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Miopía </label>
                                        </div>
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="astigmatismo_t2" {{$countmadre != 0 ? $condiciones_fisicas2[0]['astigmatismo'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Astigmatismo</label>
                                        </div>
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="ninguno_t2" {{$countmadre != 0 ? $condiciones_fisicas2[0]['ninguno'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Ninguno</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="epilepsia_t2" {{$countmadre != 0 ? $condiciones_fisicas2[0]['epilepsia'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Epilepsia </label>
                                        </div>
                                        <div class="col-1">
                                            <input type="checkbox" class="form-check-input" name="fumador_t2"  {{$countmadre != 0 ? $condiciones_fisicas2[0]['fumador'] != '' ? 'checked': '' : ''}}>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Fumador</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 align-items-center text-center p-3">
                <div class="col-md-12">
                  <button type="submit" class="btn col-4 boton_siguiente titulo" id="boton_siguiente">Siguiente</button>
                </div>
              </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(e) {
            var form = document.querySelector('#formulario');
            var submitButton = document.querySelector('#boton_siguiente');
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    Swal.fire({
                  title: "Datos Inconclusos",
                  text: "Asegurate de que todos los datos esten llenos",
                  icon: "error",
                  confirmButtonColor: "#C9D358",
                  background: "#144580",
                  color:'#fff',
                });
                } else {
                    submitButton.setAttribute('disabled', true);
                    Swal.fire({
                      title: 'Guardando Datos',
                      allowEscapeKey: false,
                      allowOutsideClick: false,
                      background:"#144580",
                      color:"#fff",
                      showConfirmButton: false,
                      didOpen: () => {
                      Swal.showLoading()
                      },
                  });
                }
                form.classList.add('was-validated');
            });
        });
    </script>
    {{-- Siguiente vista --}}
    @if(session('alta'))
<script>
    Swal.fire({
    icon: "success",
    title: "Registro Completado",
    text: 'Datos Guardados Exitosamente',
    background:"#144580",
    color: '#fff',
    allowOutsideClick: false,
    showDenyButton: true,
    confirmButtonColor: "#C9D358",
    confirmDenyButton: "#d33",
    denyButtonText: "Siguiente",
    confirmButtonText: "Inicio",
    }).then((result) => {
    if (result.isConfirmed) {
      window.location = "{{url('aspirantes_preregistro',$id)}}";
    } else if (result.isDenied) {
        @if ($aspirante->id_grado > 5)
        window.location = "{{url('requisitos_inscripcion',$id)}}";
        @else
        window.location = "{{url('aspirantes_preregistro',$id)}}";
        @endif
      
    }
    });
</script>
@endif

  {{-- Input Fecha --}}
  <script>
    $( ".datepicker" ).datepicker({
        format: 'dd/mm/yyyy',
        language: 'es',
    });
    </script>
{{-- Fin de Input Fecha --}}
</body>
</html>
