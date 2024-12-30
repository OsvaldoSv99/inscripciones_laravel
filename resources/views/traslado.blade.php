<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autorización de traslado</title>
    <link rel="shortcut icon" href="{{asset('imagenes/logo3.png')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/preregistro/autorizacion_traslado.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('js/preregistro/traslado.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
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
                  <img src="{{asset('imagenes/preregistro/tres_candado.png')}}" alt="" class="imagen_pasos">
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
            <h4 class="text-center titulo mt-3">Autorización de Traslado en Caso de Emergencia</h4>
            <form action="{{url('guardar_traslado',$id)}}" method="post"class="needs-validation" novalidate id="formulario">
              @csrf
              <input type="hidden" name="id_mama" value="{{$tutor[0]->id_tutor_padre}}">
              <input type="hidden" name="id_papa" value="{{$tutor[1]->id_tutor_padre}}">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <span class="titulo">Datos del alumno</span>
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="text-end">
                            <div class="row mt-2">
                                <div class="col-8 text-end">
                                  <label class="form-label">Fecha: </label>
                                </div>
                                <div class="col-4">
                                  <input type="text" class="form-control" value="{{date('d/m/Y')}}" readonly >
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-1 col-sm-12 text-center">
                              <label class="form-label">Nombre del alumno: </label>
                            </div>
                            <div class="col-md-11 col-sm-12">
                              <input type="text" class="form-control" value="{{$aspirante->nombre_general}}" name="nombre_alumno" required>
                              <small>(Apellido Paterno, Apellido Materno, Nombre(s))</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="row align-items-center mt-2">
                                <div class="col-md-3 col-sm-12 text-center">
                                  <label class="form-label">Fecha de nacimiento </label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                  <input type="date" class="form-control" value="{{$aspirante->fecha_nacimiento}}" name="fecha_nacimiento" readonly>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="row align-items-center mt-2">
                                <div class="col-md-3 col-sm-12 text-center">
                                  <label class="form-label">CURP </label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                  <input type="text" class="form-control" name="curp" id="curp" required value="{{$aspirante->curp}}" onkeyup="mayusculas(this)">
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                     <span class="titulo"> Datos de los tutores</span>
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row align-items-center mt-2">
                            <div class="col-md-1 col-sm-12 text-center">
                              <label class="form-label">Nombre del tutor 1: </label>
                            </div>
                            <div class="col-md-11 col-sm-12 text-start">
                              <input type="text" class="form-control" value="{{$tutor[0]->nombre_tutor}}" name="nombre_mama" required>
                              <small>(Apellido Paterno, Apellido Materno, Nombre(s))</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="row align-items-center mt-2">
                                <div class="col-md-2 col-sm-12 text-center">
                                  <label class="form-label">Edad: </label>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                  <input type="number" class="form-control" name="edad_mama" required value="{{$tutor[0]->edad}}">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="row align-items-center mt-2">
                                <div class="col-md-2 col-sm-12 text-center">
                                  <label class="form-label">Ocupación: </label>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                  <input type="text" class="form-control" name="ocupacion_mama" required value="{{$tutor[0]->ocupacion}}">
                                </div>
                              </div>
                            </div>
                          </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="row align-items-center mt-2">
                                <div class="col-md-2 col-sm-12 text-center">
                                  <label class="form-label">Grado de Estudios: </label>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                  <input type="text" class="form-control" name="gradoestudios_mama" required value="{{$tutor[0]->grado_estudios}}">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="row align-items-center mt-2">
                                <div class="col-md-2 col-sm-12 text-center">
                                  <label class="form-label">CURP: </label>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                  <input type="text" class="form-control" name="curp_mama" id="curp_mama" required value="{{$tutor[0]->curp}}" onkeyup="mayusculas(this)">
                                </div>
                              </div>
                            </div>
                          </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="row align-items-center mt-2">
                                <div class="col-md-2 col-sm-12 text-center">
                                  <label class="form-label">Teléfono: </label>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                  <input type="number" class="form-control"  value="{{$tutor[0]->telefono_casa_tutor}}" name="telefono_mama" id="telefono_mama" >
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="row align-items-center mt-2">
                                <div class="col-md-2 col-sm-12 text-center">
                                  <label class="form-label">Email: </label>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                  <input type="text" class="form-control"  value="{{$tutor[0]->email_tutor}}" name="email_mama" required>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row align-items-center mt-2">
                            <div class="col-md-1 col-sm-12 text-center">
                              <label class="form-label">Dirección: </label>
                            </div>
                            <div class="col-md-11 col-sm-12">
                              <textarea id="" class="form-control" name="direccion_mama" required>{{$tutor[0]->direccion_tutor}}</textarea>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-1 col-sm-12 text-center">
                              <label class="form-label">Nombre del tutor 2: </label>
                            </div>
                            <div class="col-md-11 col-sm-12 text-start">
                              <input type="text" class="form-control" value="{{$tutor[1]->nombre_tutor}}" name="nombre_papa" required >
                              <small>(Apellido Paterno, Apellido Materno, Nombre(s))</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="row align-items-center mt-2">
                                <div class="col-md-2 col-sm-12 text-center">
                                  <label class="form-label">Edad</label>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                  <input type="number" class="form-control" name="edad_papa" required value="{{$tutor[1]->edad}}">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="row align-items-center mt-2">
                                <div class="col-md-2 col-sm-12 text-center">
                                  <label class="form-label">Ocupación</label>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                  <input type="text" class="form-control" name="ocupacion_papa" required value="{{$tutor[1]->ocupacion}}">
                                </div>
                              </div>
                            </div>
                          </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="row align-items-center mt-2">
                                <div class="col-md-2 col-sm-12 text-center">
                                  <label class="form-label">Grado de Estudios</label>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                  <input type="text" class="form-control" name="gradoestudios_papa" required value="{{$tutor[1]->grado_estudios}}">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="row align-items-center mt-2">
                                <div class="col-md-2 col-sm-12 text-center">
                                  <label class="form-label">CURP</label>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                  <input type="text" class="form-control" name="curp_papa" id="curp_papa" required value="{{$tutor[1]->curp}}" onkeyup="mayusculas(this)">
                                </div>
                              </div>
                            </div>
                          </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="row align-items-center mt-2">
                                <div class="col-md-2 col-sm-12 text-center">
                                  <label class="form-label">Teléfono</label>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                  <input type="number" class="form-control" value="{{$tutor[1]->telefono_casa_tutor}}" name="telefono_papa" id="telefono_papa" >
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="row align-items-center mt-2">
                                <div class="col-md-2 col-sm-12 text-center">
                                  <label class="form-label">Email</label>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                  <input type="text" class="form-control" value="{{$tutor[1]->email_tutor}}" name="email_papa" required>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row align-items-center mt-2">
                            <div class="col-md-1 col-sm-12 text-center">
                              <label class="form-label">Dirección: </label>
                            </div>
                            <div class="col-md-11 col-sm-12">
                              <textarea id="" class="form-control" name="direccion_papa" required>{{$tutor[1]->direccion_tutor}} </textarea>
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
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  </body>
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
/* Read more about isConfirmed, isDenied below */
if (result.isConfirmed) {
  window.location = "{{url('inicio_aspirante',$id)}}";
} else if (result.isDenied) {
  window.location = "#";
}
});
</script>
@endif
<script>
  function mayusculas(field) {
        field.value = field.value.toUpperCase();
    }
</script>
</html>