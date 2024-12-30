<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Indicaciones de Cuidados</title>
    <link rel="shortcut icon" href="{{asset('imagenes/logo3.png')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/preregistro/indicaciones.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
              <img src="{{asset('imagenes/preregistro/tres.png')}}" alt="" class="imagen_pasos">
            </div>
            <div class="col-2">
              <img src="{{asset('imagenes/preregistro/cuatro.png')}}" alt="" class="imagen_pasos">
            </div>
            <div class="col-2">
              <img src="{{asset('imagenes/preregistro/cinco_candado.png')}}" alt="" class="imagen_pasos">
            </div>
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
      <form action="{{url('guardar_indicaciones',$id)}}" method="post" class="needs-validation" novalidate id="formulario">
        @csrf
        <h4 class="titulo text-center mt-2">Indicaciones de Cuidados</h4>
        <div class="card">
            <div class="card-header titulo">Maternal {{$aspirante->id_grado == 4 ? '1' : "2" }}</div>
            <div class="p-2">
            <div class="row">
              <div class="col-md-8 col-sm-12">
                <div class="row align-items-center mt-2">
                  <div class="col-md-3 col-sm-12 text-center">
                    <label class="form-label">Nombre del alumno: </label>
                  </div>
                  <div class="col-md-9 col-sm-12">
                    <input type="text" class="form-control" name="nombre_alumno" required value="{{$aspirante->nombre_general}}">
                    <small>(Apellido Paterno, Apellido Materno, Nombre(s))</small>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="row align-items-center mt-2">
                  <div class="col-md-2 col-sm-12 text-center">
                    <label class="form-label">Fecha: </label>
                  </div>
                  <div class="col-md-10 col-sm-12">
                    <input type="text" class="form-control" value="{{date('d-m-Y')}}" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="row align-items-center mt-2">
                <div class="col-md-2 col-sm-12 text-center">
                  <label class="form-label">Me gusta que me llamen: </label>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="text" class="form-control" name="nombre_gusto" required>
                </div>
            </div>
            <div class="row align-items-center mt-2">
                <div class="col-md-2 col-sm-12 text-center">
                  <label class="form-label">Fecha de nacimiento: </label>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="date" class="form-control" name="fecha_nacimiento" readonly value="{{$aspirante->fecha_nacimiento}}">
                </div>
            </div>
            <div class="row align-items-center mt-2">
                <div class="col-md-2 col-sm-12 text-center">
                  <label class="form-label">Edad exacta al ingreso: </label>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="text" class="form-control" name="edad_ingreso" required>
                </div>
            </div>
            <div class="row align-items-center mt-2">
                <div class="col-md-2 col-sm-12 text-center">
                  <label class="form-label">Horario aproximado de estancia: </label>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="text" class="form-control" name="horario_estancia" required>
                </div>
            </div>
            <div class="row align-items-center mt-2">
                <div class="col-md-2 col-sm-12 text-center">
                  <label class="form-label">Condición médica: </label>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="text" class="form-control" name="condicion_medica" required value="{{$aspirante->condicion_medica}}">
                </div>
            </div>
            <div class="row align-items-center mt-2">
                <div class="col-md-2 col-sm-12 text-center">
                  <label class="form-label">Dato importante sobre la salud: </label>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="text" class="form-control" name="dato_salud" required>
                </div>
            </div>
            <div class="row align-items-center mt-2">
                <div class="col-md-2 col-sm-12 text-center">
                  <label class="form-label">Alimento prohibido: </label>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="text" class="form-control" name="alimento_prohibido" required>
                </div>
            </div>
            <div class="row align-items-center mt-2">
                <div class="col-md-2 col-sm-12 text-center">
                  <label class="form-label">Toma agua natural: </label>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="text" class="form-control" name="agua_natural" required>
                </div>
            </div>
            <div class="row align-items-center mt-2">
                <div class="col-md-2 col-sm-12 text-center">
                  <label class="form-label">En qué horario del colegio y en qué cantidad: </label>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="text" class="form-control" name="horario_colegio" required>
                </div>
            </div>
            <div class="row align-items-center mt-2">
                <div class="col-md-2 col-sm-12 text-center">
                  <label class="form-label">Limitar o motivar a comer: </label>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="text" class="form-control" name="limitar_comer" required>
                </div>
            </div>
            <div class="row align-items-center mt-2" style={{$aspirante->id_grado == 5 ? 'display:none' : ''}}>
                <div class="col-md-2 col-sm-12 text-center">
                  <label class="form-label">Cambio de pañal cada: </label>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="text" class="form-control" name="cambio_panal" >
                </div>
            </div>
            <div class="row align-items-center mt-2">
                <div class="col-md-2 col-sm-12 text-center">
                  <label class="form-label">
                    @if ($aspirante->id_grado == 4)
                        Indicación especial en el cambio de pañal:
                    @else
                        ¿Controla esfínteres? En caso de que no, indicaciones especiales para su cambio de pañal:
                    @endif
                  </label>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="text" class="form-control" name="indicacion_panal" required>
                </div>
            </div>
            <div class="row align-items-center mt-2" style={{$aspirante->id_grado == 5 ? 'display:none' : ''}}>
                <div class="col-md-2 col-sm-12 text-center">
                  <label class="form-label">Duerme la siesta indicada en el horario: </label>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="text" class="form-control" name="siesta_horario" >
                </div>
            </div>
            <div class="row align-items-center mt-2">
                <div class="col-md-2 col-sm-12 text-center">
                  <label class="form-label">
                    @if ($aspirante->id_grado == 4)
                        Tiempo de siesta:       
                    @else
                        ¿Aún duerme siesta? En caso de que si, cuánto tiempo autoriza:
                    @endif
                  </label>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="text" class="form-control" name="tiempo_siesta" required>
                </div>
            </div>
            <div class="row align-items-center mt-2">
              <div class="col-md-2 col-sm-12 text-center">
                <label class="form-label">
                  @if ($aspirante->id_grado == 4)      
                  Otro: 
                  @else
                  Otra indicación importante: 
                  @endif
                </label>
              </div>
              <div class="col-md-10 col-sm-12">
                <input type="text" class="form-control" name="otro" required>
              </div>
            </div>
          </div>
          <p class="text-center">NOTA: Es importante llenar este formulario al ingreso del pequeño al Colegio y ACTUALIZARLO cada vez que haya un cambio en las indicaciones por parte de los padres o bien un cambio de grado</p>
        </div>
        <div class="col-12 align-items-center text-center p-3">
          <div class="col-md-12">
            <button type="submit" class="btn col-4 boton_siguiente titulo" id="boton_siguiente">Siguiente</button>
            {{-- <button type="submit" class="btn" formaction="{{url('pdf_cuidados',$id)}}">PDF</button> --}}
          </div>
        </div>
    </div>
    
  </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
window.location = "{{url('aspirantes_preregistro',$id)}}";
} else if (result.isDenied) {
window.location = "{{url('requisitos_inscripcion',$id)}}";
}
});
</script>
@endif
</html>