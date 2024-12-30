<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ficha de inscripción</title>
    <link rel="shortcut icon" href="{{asset('imagenes/logo3.png')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/preregistro/ficha_inscripcion.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('js/preregistro/ficha_inscripcion.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/datepicker.css')}}">
    @if ($count == 0)
    <script src="{{asset('js/correos_preregistro.js')}}"></script>
    @endif
  </head>
    <body>
        {{-- Header --}}
        <div class="header">
            <div class="row col-12 text-center justify-content-center">
                <div class="col-2">
                  <img src="{{asset('imagenes/preregistro/uno.png')}}" alt="" class="imagen_pasos">
                </div>
                <div class="col-2">
                  <img src="{{asset('imagenes/preregistro/dos_candado.png')}}" alt="" class="imagen_pasos">
                </div>
                <div class="col-2">
                  <img src="{{asset('imagenes/preregistro/tres_candado.png')}}" alt="" class="imagen_pasos">
                </div>
                <div class="col-2">
                  <img src="{{asset('imagenes/preregistro/cuatro_candado.png')}}" alt="" class="imagen_pasos">
                </div>
                <div class="col-2">
                  <img src="{{asset('imagenes/preregistro/cinco_candado.png')}}" alt="" class="imagen_pasos">
                </div>
            </div>
        </div>

        {{-- Formulario --}}
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-5">
                <nav style="height: 8px !important">
                    <ol class="breadcrumb">
                      <div>
                          <li class="breadcrumb-item">
                              <a href="{{url('inicio')}}"
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
            <h4 class="text-center titulo mt-3">Ficha de inscripción</h4>
            <form class="needs-validation" novalidate action="{{route('guardar_ficha')}}" id="formulario" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="sucursal" value="{{$sucursal}}">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <span class="titulo">Información del niño o la niña</span>
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <div class="row">
                        <div class="col-md-3 text-center">
                          <div class="file-select div_fotonino" id="src-file1" style="background-color: white">
                            <input type="file" name="foto_nino" class="fotonino" aria-label="Archivo" required accept="image/jpeg">
                          </div>
                        </div>
                        <div class="col-md-9 col-sm-12 text-center mt-2">
                          <div class="row align-items-center">
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Fecha</label>
                            </div>
                            <div class="col-md-7 col-sm-12">
                              <input type="date" class="form-control" value="{{date('Y-m-d')}}" readonly>
                            </div>
                          </div>
                          <div class="row align-items-center mt-3">
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Fecha programada de ingreso</label>
                            </div>
                            <div class="col-md-4 col-sm-12">
                              <input type="text" name="inicio_clases_fecha" class="form-control datepicker" id="fecha_ingreso" required autocomplete="off">
                            </div>
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Ciclo Escolar</label>
                            </div>
                            <div class="col-md-4 col-sm-12">
                              <input type="hidden" name="ciclo_escolar" id="id_ciclo" value="1">
                              <input type="text" class="ciclo_escolar form-control" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="row align-items-center mt-2">
                        <div class="col-md-2 col-sm-12 text-center">
                          <label class="form-label">Nombre del niño o niña</label>
                        </div>
                        <div class="col-md-10 col-sm-12">
                          <input type="text" name="nombre_nino" class="form-control" required>
                          
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="row align-items-center mt-2">
                            <div class="col-md-4 col-sm-12 text-center">
                              <label class="form-label">Fecha de nacimiento</label>
                            </div>
                            <div class="col-md-8 col-sm-12">
                              <input type="date" name="fecha_nacimiento" class="form-control" value="{{$fecha_nacimiento}}" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="row align-items-center mt-2">
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Edad</label>
                            </div>
                            <div class="col-md-10 col-sm-12">
                              <input type="number" name="edad" class="form-control" value="{{$edad->y}}" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="row align-items-center mt-2">
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Meses</label>
                            </div>
                            <div class="col-md-10 col-sm-12">
                              <input type="number" name="meses" class="form-control" value="{{$edad->m}}" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row align-items-center mt-2">
                        <div class="col-md-2 col-sm-12 text-center">
                          <label class="form-label">Condición médica</label>
                        </div>
                        <div class="col-md-10 col-sm-12">
                          <input type="text" name="condicion_medica" class="form-control" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="row align-items-center mt-2">
                            <div class="col-md-4 col-sm-12 text-center">
                              <label class="form-label">Alergias a alimentos</label>
                            </div>
                            <div class="col-md-8 col-sm-12">
                              <input type="text" name="alergia_alimentos" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="row align-items-center mt-2">
                            <div class="col-md-3 col-sm-12 text-center">
                              <label class="form-label">Otras alergias</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                              <input type="text" name="otras_alergias" class="form-control" required >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                      <span class="titulo">Información de los tutores</span>
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      {{-- <small>** Si solo se cuenta con un tutor, repetir los campos en tutor 2.</small> --}}
                    <div class="row mt-3 ">
                      @if ($count != 0)
                        <div class="col-md-3 text-center">
                          <div class="file-select div_fotomama" id="src-file2" style="background-color:#C9D358; background-image: url({{asset('storage/preregistro/tutores/'.$padre[1]->id_tutor_padre.'/'.$padre[1]->foto_tutor)}}); background-size:cover; opacity:0.8">
                            <input type="file" name="foto_mama" class="fotomama" aria-label="Archivo" accept="image/jpeg" disabled>
                          </div>
                        </div>
                      @else
                        <div class="col-md-3 text-center">
                          <div class="file-select div_fotomama" id="src-file2" style="background-color:white">
                            <input type="file" name="foto_mama" class="fotomama" aria-label="Archivo" required accept=" image/jpeg">
                          </div>
                        </div>
                      @endif
                      <div class="col-md-9 col-sm-12 text-center mt-2">
                        <div class="row align-items-center">
                          <div class="col-md-2 col-sm-12 text-center">
                            <label class="form-label">Nombre del tutor 1</label>
                          </div>
                          <div class="col-md-9 col-sm-12 text-start">
                            <input type="text" name="nombre_mama" class="form-control" required value="{{$count != 0 ? $padre[1]->nombre_tutor : ''}}">
                            
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <div class="row align-items-center mt-2">
                              <div class="col-md-4 col-sm-12 text-center">
                                <label class="form-label">Teléfono de casa: </label>
                              </div>
                              <div class="col-md-8 col-sm-12">
                                <input type="number" name="telefono1_mama" id="telefono1_mama" class="form-control"  value="{{$count != 0 ? $padre[1]->telefono_casa_tutor : ''}}" >
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="row align-items-center mt-2">
                              <div class="col-md-3 col-sm-12 text-center">
                                <label class="form-label">Teléfono trabajo: </label>
                              </div>
                              <div class="col-md-7 col-sm-12">
                                <input type="number" name="telefono2_mama" id="telefono2_mama" class="form-control"  value="{{$count != 0 ? $padre[1]->telefono_trabajo_tutor : ''}}">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center mt-2">
                          <div class="col-md-2 col-sm-12 text-center">
                            <label class="form-label">Celular: </label>
                          </div>
                          <div class="col-md-9 col-sm-12">
                            <input type="number" name="celular_mama" id="celular_mama" class="form-control"  value="{{$count != 0 ? $padre[1]->celular_tutor : ''}}" required>
                          </div>
                        </div>
                        <div class="row align-items-center mt-3">
                          <div class="col-md-2 col-sm-12 text-center">
                            <label class="form-label">Dirección: </label>
                          </div>
                          <div class="col-md-9 col-sm-12">
                            <input type="text" name="direccion_mama" class="form-control"  value="{{$count != 0 ? $padre[1]->direccion_tutor : ''}}">
                          </div>
                        </div>
                        <div class="row align-items-center mt-3">
                          <div class="col-md-2 col-sm-12 text-center">
                            <label class="form-label">Email: </label>
                          </div>
                          <div class="col-md-9 col-sm-12">
                            <input type="email" name="email_mama" class="form-control email_mama" {{$count != 0 ? 'readonly' : 'required'}} value="{{$count != 0 ? $padre[1]->email_tutor : ''}}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <input type="checkbox" name="repetir_tutor" class="form-check-input" name="" id=""> Sin tutor 2
                    <div class="row mt-3">
                      @if ($count != 0)
                      <div class="col-md-3 text-center">
                        <div class="file-select div_fotopapa" id="src-file3" style="background-color:#C9D358; background-image: url({{asset('storage/preregistro/tutores/'.$padre[0]->id_tutor_padre.'/'.$padre[0]->foto_tutor)}}); background-size:cover; opacity:0.8">
                          <input type="file" name="foto_papa" class="fotopapa" aria-label="Archivo" accept=" image/jpeg" disabled>
                        </div>
                      </div>
                      @else
                      <div class="col-md-3 text-center">
                        <div class="file-select div_fotopapa" id="src-file3" style="background-color:white">
                          <input type="file" name="foto_papa" class="fotopapa" aria-label="Archivo" required accept=" image/jpeg">
                        </div>
                      </div>
                      @endif
                      <div class="col-md-9 col-sm-12 text-center mt-2">
                        <div class="row align-items-center">
                          <div class="col-md-2 col-sm-12 text-center">
                            <label class="form-label">Nombre del tutor 2</label>
                          </div>
                          <div class="col-md-9 col-sm-12 text-start">
                            <input type="text" name="nombre_papa" class="form-control" required value="{{$count != 0 ? $padre[0]->nombre_tutor : ''}}">
                            
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <div class="row align-items-center mt-2">
                              <div class="col-md-4 col-sm-12 text-center">
                                <label class="form-label">Teléfono de casa: </label>
                              </div>
                              <div class="col-md-8 col-sm-12">
                                <input type="number" name="telefono1_papa" id="telefono1_papa" class="form-control"  value="{{$count != 0 ? $padre[0]->telefono_casa_tutor : ''}}">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="row align-items-center mt-2">
                              <div class="col-md-3 col-sm-12 text-center">
                                <label class="form-label">Teléfono trabajo: </label>
                              </div>
                              <div class="col-md-7 col-sm-12">
                                <input type="number" name="telefono2_papa" id="telefono2_papa" class="form-control"  value="{{$count != 0 ? $padre[0]->telefono_trabajo_tutor : ''}}">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row align-items-center mt-2">
                          <div class="col-md-2 col-sm-12 text-center">
                            <label class="form-label">Celular: </label>
                          </div>
                          <div class="col-md-9 col-sm-12">
                            <input type="number" name="celular_papa" id="celular_papa" class="form-control"  value="{{$count != 0 ? $padre[0]->celular_tutor : ''}}" required>
                          </div>
                        </div>
                        <div class="row align-items-center mt-3">
                          <div class="col-md-2 col-sm-12 text-center">
                            <label class="form-label">Dirección: </label>
                          </div>
                          <div class="col-md-9 col-sm-12">
                            <input type="text" name="direccion_papa" class="form-control"  value="{{$count != 0 ? $padre[0]->direccion_tutor : ''}}">
                          </div>
                        </div>
                        <div class="row align-items-center mt-3">
                          <div class="col-md-2 col-sm-12 text-center">
                            <label class="form-label">Email: </label>
                          </div>
                          <div class="col-md-9 col-sm-12">
                            <input type="email" name="email_papa" class="form-control email_papa" {{$count != 0 ? 'readonly' : 'required'}} value="{{$count != 0 ? $padre[0]->email_tutor : ''}}">
                          </div>
                        </div>
                        <br>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                      <span class="titulo">Contacto de emergencia (diferente a tutores)</span>
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <div class="row align-items-center">
                        <div class="col-md-1 col-sm-12 text-center">
                          <label class="form-label">Nombre: </label>
                        </div>
                        <div class="col-md-11 col-sm-12 text-start">
                          <input type="text" name="nombre_emergencia" class="form-control" required>
                          
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="row align-items-center mt-2">
                            <div class="col-md-3 col-sm-12 text-center">
                              <label class="form-label">Teléfono de casa: </label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                              <input type="number" name="telefono1_emergencia" id="telefono1_emergencia" class="form-control" >
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="row align-items-center mt-2">
                            <div class="col-md-3 col-sm-12 text-center">
                              <label class="form-label">Teléfono trabajo: </label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                              <input type="number" name="telefono2_emergencia" id="telefono2_emergencia" class="form-control" >
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="row align-items-center mt-2">
                            <div class="col-md-3 col-sm-12 text-center">
                              <label class="form-label">Celular: </label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                              <input type="number" name="celular_emergencia" id="celular_emergencia" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="row align-items-center mt-2">
                            <div class="col-md-3 col-sm-12 text-center">
                              <label class="form-label">Parentesco: </label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                              <input type="text" name="parentesco_contacto" id="parentesco_contacto" class="form-control" required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                      <span class="titulo"> Personas Autorizadas (diferente a tutores)</span>
                    </button>
                  </h2>
                  <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <div class="row align-items-center mt-2">
                        <div class="col-1 text-center">
                          <strong class="form-label">Yo: </strong>
                        </div>
                        <div class="col-11">
                          <input type="text" class="form-control" name="persona_autorizada" required>
                        </div>
                      </div>
                      <strong>autorizo a que mi hijo o hija sea recogido o recogida por las personas que a continuación menciono, presentando su credencial autorizada.</strong>
                      <br>

                      @if ($count != 0)
                      <input type="checkbox" class="form-check-input" name="cambiar_autorizados" id=""> <label for="">Cambiar Autorizados</label>
                      @endif
                      <div class="row mt-3">
                        @if ($count !=  0)
                        <div class="col-md-3 text-center">
                          <div class="file-select div_foto1" id="src-file4" style="background-color:#C9D358; background-image: url({{asset('storage/preregistro/autorizados/'.$autorizados[0]->id_autorizado.'/'.$autorizados[0]->foto_pariente)}}); background-size:cover; opacity:0.8">
                            <input type="file" name="foto_1" class="foto1" aria-label="Archivo" accept=" image/jpeg" disabled>
                          </div>
                        </div>
                        @else
                        <div class="col-md-3 text-center">
                          <div class="file-select div_foto1" id="src-file4" style="background-color:white">
                            <input type="file" name="foto_1" class="foto1" aria-label="Archivo" required accept=" image/jpeg" >
                          </div>
                        </div>
                        @endif
                        <div class="col-md-9 col-sm-12 text-center mt-2">
                          <div class="row align-items-center">
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Nombre: </label>
                            </div>
                            <div class="col-md-10 col-sm-12 text-start">
                              <input type="text" name="nombre_1" class="form-control" required value="{{$count != 0 ? $autorizados[0]->nombre_autorizado : ''}}" {{$count != 0 ? 'readonly' : ''}}>
                              
                            </div>
                          </div>
                          <div class="row align-items-center mt-3">
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Parentesco: </label>
                            </div>
                            <div class="col-md-10 col-sm-12">
                              <input type="text" name="parentesco_1" class="form-control" required  value="{{$count != 0 ? $autorizados[0]->parentesco : ''}}" {{$count != 0 ? 'readonly' : ''}}>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        @if ($count != 0 )
                          @if ( !empty($autorizados[1]))
                          <div class="col-md-3 text-center">
                            <div class="file-select div_foto2" id="src-file5" class="foto2" style="background-color:#C9D358; background-image: url({{asset('storage/preregistro/autorizados/'.$autorizados[1]->id_autorizado.'/'.$autorizados[1]->foto_pariente)}}); background-size:cover; opacity:0.8">
                              <input type="file" name="foto_2" class="foto2" aria-label="Archivo" accept="image/jpeg" disabled>
                            </div>
                          </div>
                          @else
                          <div class="col-md-3 text-center">
                            <div class="file-select div_foto2" id="src-file5" class="foto2" style="background-color:white">
                              <input type="file" name="foto_2" class="foto2" aria-label="Archivo" accept="image/jpeg" disabled>
                            </div>
                          </div>
                          @endif
                        @else
                        <div class="col-md-3 text-center">
                          <div class="file-select div_foto2" id="src-file5" class="foto2" style="background-color:white">
                            <input type="file" name="foto_2" class="foto2" aria-label="Archivo" accept="image/jpeg">
                          </div>
                        </div>
                        @endif
                        <div class="col-md-9 col-sm-12 text-center mt-2">
                          <div class="row align-items-center">
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Nombre: </label>
                            </div>
                            <div class="col-md-10 col-sm-12 text-start">
                              <input type="text" name="nombre_2" class="form-control"  value="{{ $count != 0 ? empty($autorizados[1]) ? '' : $autorizados[1]->nombre_autorizado  : ''}}" {{ $count != 0 ? 'readonly'  : ''}}>
                              
                            </div>
                          </div>
                          <div class="row align-items-center mt-3">
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Parentesco: </label>
                            </div>
                            <div class="col-md-10 col-sm-12">
                              <input type="text" name="parentesco_2" class="form-control"  value="{{  $count != 0 ? empty($autorizados[1]) ? '' : $autorizados[1]->parentesco  : ''}}" {{ $count != 0 ? 'readonly': ''}}>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        @if ($count != 0 )
                          @if (!empty($autorizados[2]))
                          <div class="col-md-3 text-center">
                            <div class="file-select div_foto3" id="src-file6" style="background-color:#C9D358; background-image: url({{asset('storage/preregistro/autorizados/'.$autorizados[2]->id_autorizado.'/'.$autorizados[2]->foto_pariente)}}); background-size:cover; opacity:0.8">
                              <input type="file" name="foto_3" class="foto3" aria-label="Archivo" accept="image/jpeg" disabled>
                            </div>
                          </div>
                          @else
                          <div class="col-md-3 text-center">
                            <div class="file-select div_foto3" id="src-file6"  style="background-color:white">
                              <input type="file" name="foto_3" class="foto3" aria-label="Archivo" accept="image/jpeg" disabled>
                            </div>
                          </div>
                          @endif
                        @else
                        <div class="col-md-3 text-center">
                          <div class="file-select div_foto3" id="src-file6"  style="background-color:white">
                            <input type="file" name="foto_3" class="foto3" aria-label="Archivo" accept="image/jpeg">
                          </div>
                        </div>
                        @endif
                        <div class="col-md-9 col-sm-12 text-center mt-2">
                          <div class="row align-items-center">
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Nombre: </label>
                            </div>
                            <div class="col-md-10 col-sm-12 text-start">
                              <input type="text" name="nombre_3" class="form-control" value="{{ $count != 0 ? empty($autorizados[2]) ? '' : $autorizados[2]->nombre_autorizado  : ''}}" {{ $count != 0 ? 'readonly' : ''}}>
                              
                            </div>
                          </div>
                          <div class="row align-items-center mt-3">
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Parentesco: </label>
                            </div>
                            <div class="col-md-10 col-sm-12">
                              <input type="text" name="parentesco_3" class="form-control" value="{{ $count != 0 ? empty($autorizados[2]) ? '' : $autorizados[2]->parentesco  : ''}}" {{ $count != 0 ? 'readonly' : ''}}>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        @if ($count != 0)
                          @if (!empty($autorizados[3]))
                          <div class="col-md-3 text-center">
                            <div class="file-select div_foto4" id="src-file7" style="background-color:#C9D358; background-image: url({{asset('storage/preregistro/autorizados/'.$autorizados[3]->id_autorizado.'/'.$autorizados[3]->foto_pariente)}}); background-size:cover; opacity:0.8">
                              <input type="file" name="foto_4" class="foto4" aria-label="Archivo" accept="image/jpeg" disabled>
                            </div>
                          </div>
                          @else
                          <div class="col-md-3 text-center">
                            <div class="file-select div_foto4" id="src-file7" style="background-color:white">
                              <input type="file" name="foto_4" class="foto4" aria-label="Archivo" accept="image/jpeg" disabled>
                            </div>
                          </div>
                          @endif

                        @else
                        <div class="col-md-3 text-center">
                          <div class="file-select div_foto4" id="src-file7" style="background-color:white">
                            <input type="file" name="foto_4" class="foto4" aria-label="Archivo" accept="image/jpeg" >
                          </div>
                        </div>
                        @endif

                        <div class="col-md-9 col-sm-12 text-center mt-2">
                          <div class="row align-items-center">
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Nombre: </label>
                            </div>
                            <div class="col-md-10 col-sm-12 text-start">
                              <input type="text" name="nombre_4" class="form-control" value="{{ $count != 0 ? empty($autorizados[3]) ? '' : $autorizados[3]->nombre_autorizado  : ''}}" {{ $count != 0 ? 'readonly' : ''}}>
                              
                            </div>
                          </div>
                          <div class="row align-items-center mt-3">
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Parentesco: </label>
                            </div>
                            <div class="col-md-10 col-sm-12">
                              <input type="text" name="parentesco_4" class="form-control" value="{{ $count != 0 ? empty($autorizados[3]) ? '' : $autorizados[3]->parentesco  : ''}}" {{ $count != 0 ? 'readonly' : ''}}>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        @if ($count != 0)
                          @if (!empty($autorizados[4]))
                          <div class="col-md-3 text-center">
                            <div class="file-select div_foto5" id="src-file8"style="background-color:#C9D358; background-image: url({{asset('storage/preregistro/autorizados/'.$autorizados[4]->id_autorizado.'/'.$autorizados[4]->foto_pariente)}}); background-size:cover; opacity:0.8">
                              <input type="file" name="foto_5" class="foto5" aria-label="Archivo" accept="image/jpeg" disabled>
                            </div>
                          </div>
                          @else
                          <div class="col-md-3 text-center">
                            <div class="file-select div_foto5" id="src-file8" style="background-color:white">
                              <input type="file" name="foto_5" class="foto5" aria-label="Archivo" accept="image/jpeg" disabled>
                            </div>
                          </div>
                          @endif

                        @else
                        <div class="col-md-3 text-center">
                          <div class="file-select div_foto5" id="src-file8" style="background-color:white">
                            <input type="file" name="foto_5" class="foto5" aria-label="Archivo" accept="image/jpeg">
                          </div>
                        </div>
                        @endif
                        <div class="col-md-9 col-sm-12 text-center mt-2">
                          <div class="row align-items-center">
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Nombre: </label>
                            </div>
                            <div class="col-md-10 col-sm-12 text-start">
                              <input type="text" name="nombre_5" class="form-control" value="{{ $count != 0 ? empty($autorizados[4]) ? '' : $autorizados[3]->nombre_autorizado  : ''}}" {{ $count != 0 ? 'readonly' : ''}}>
                              
                            </div>
                          </div>
                          <div class="row align-items-center mt-3">
                            <div class="col-md-2 col-sm-12 text-center">
                              <label class="form-label">Parentesco: </label>
                            </div>
                            <div class="col-md-10 col-sm-12">
                              <input type="text" name="parentesco_5" class="form-control" value="{{ $count != 0 ? empty($autorizados[4]) ? '' : $autorizados[3]->parentesco  : ''}}" {{ $count != 0 ? 'readonly' : ''}}>
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
                  {{-- <button type="submit" formaction="{{route('pdf_fichainscripcion')}}" class="btn col-4 boton_siguiente titulo" id="boton_siguiente">PDF</button> --}}
                </div>
              </div>
            </form>
        </div>
        {{-- Input Fecha --}}
        <script>
          $( ".datepicker" ).datepicker({
              format: 'yyyy-mm-dd',
              language: 'es',
          });
          </script>
  {{-- Fin de Input Fecha --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        {{-- No validate --}}
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
                      text: "Asegurate de que todos los datos esten llenos (Fotos y cuadros de texto).IMPORTANTE (En caso de ser mamá o papá la persona autorizada, volver  a colocar el nombre en los nombres)",
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
  </body>
  @if(session('alta'))
  <script>
      Swal.fire({
      icon: "success",
      title: "Registro Completado",
      text: 'Datos Guardados Exitosamente',
      background:"#144580",
      color:"#fff",
      allowOutsideClick: false,
      showDenyButton: true,
      confirmButtonColor: "#C9D358",
      confirmDenyButton: "#d33",
      denyButtonText: "Siguiente",
      confirmButtonText: "Inicio",
      })
  </script>
  @endif
  <script>
    $(document).ready(function(){
      $("#fecha_ingreso").on("change",function(){
        var fechaIngreso = $(this).val();
        $.ajax({
          type:'get',
          url: '{{route('ajax_ingreso')}}',
          data:{
            fechaIngreso:fechaIngreso
          },
          success:function(data){
            $(".ciclo_escolar").val(data['ciclo_escolar'])
            $("#id_ciclo").val(data['idCiclo'])
          },
          error:function(data){
            // console.log(data)
          }
        });
      }); 
    });
</script>

</html>
