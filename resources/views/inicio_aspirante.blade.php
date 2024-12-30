<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preregistro</title>
    <link rel="shortcut icon" href="{{asset('imagenes/logo3.png')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('js/preregistro/index.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/preregistro/preregistro.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/datepicker.css')}}">
  </head>
  <body>
    <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-5">
          <nav style="height: 8px !important">
              <ol class="breadcrumb" style="padding:1.5rem;">
                <div>
                    <li class="breadcrumb-item">
                        <a href="#"
                            style="display:block;margin-bottom:2rem; text-decoration: none; font-weight:bold; color:#fff">
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
    <form action="{{route('ficha_inscripcion')}}" method="get" class="needs-validation" novalidate>
      <input type="hidden" name="sucursal" class="sucursal" value="0" required>
    <h4 class="text-center text-white mt-1">Elige tu plantel</h4>
    <div class="d-flex justify-content-center mt-4" style="padding-bottom: 1rem;">
      <div class="row">
        <div class="col-3 px-1 ">
          <img src="{{asset('imagenes/sucursal_toluca.png')}}" alt="" class="imagen_sucursal" id="sucursal_toluca">
        </div>
        <div class="col-3 px-1">
          <img src="{{asset('imagenes/sucursal_metepec.png')}}" alt="" class="imagen_sucursal" id="sucursal_metepec">
        </div>
        <div class="col-3 px-1">
          <img src="{{asset('imagenes/sucursal_santa_fe.png')}}" alt="" class="imagen_sucursal" id="sucursal_santafe">
        </div>
        <div class="col-3 px-1">
          <img src="{{asset('imagenes/sucursal_zibata.png')}}" alt="" class="imagen_sucursal" id="sucursal_zibata">
        </div>
      </div>
    </div>
    <br>
    <div class="d-flex justify-content-center" >
      <div class="row col-md-6 col-sm-12">
      <div class="col-md-8 col-sm-12">
        <h5 class="texto_nacimiento mt-2">¿Cuál es la fecha de nacimiento de tu hijo?</h5>
      </div>
      <div class="col-md-4 col-sm-12">
        <input type="text" name="fecha_nacimiento" class="form-control datepicker" id="fecha_nacimiento" required autocomplete="off">
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center mt-2">
    <div class="row col-10 text-center justify-content-center">
      <div class="col-lg-2 col-sm-5 ms-3">
        <img src="{{asset('imagenes/preregistro/uno.png')}}" alt="" class="imagen_pasos"><br>
        <img src="{{asset('imagenes/preregistro/tache.png')}}" alt="" class="imagen_pasos"><br>
        <strong class="nombre_categoria">Ficha de Inscripción</strong>
      </div>
      <div class="col-lg-2 col-sm-5 ms-3">
        <img src="{{asset('imagenes/preregistro/dos.png')}}" alt="" class="imagen_pasos"><br>
        <img src="{{asset('imagenes/preregistro/tache.png')}}" alt="" class="imagen_pasos"><br>
        <strong class="nombre_categoria">Autorización de Traslado</strong>
      </div>
      <div class="col-lg-2 col-sm-5 ms-3">
        <img src="{{asset('imagenes/preregistro/tres.png')}}" alt="" class="imagen_pasos"><br>
        <img src="{{asset('imagenes/preregistro/tache.png')}}" alt="" class="imagen_pasos"><br>
        <strong class="nombre_categoria">Cuestionario de Salud</strong>
      </div>
      <div class="col-lg-2 col-sm-5 ms-3">
        <img src="{{asset('imagenes/preregistro/cuatro.png')}}" alt="" class="imagen_pasos"><br>
        <img src="{{asset('imagenes/preregistro/tache.png')}}" alt="" class="imagen_pasos"><br>
        <strong class="nombre_categoria">Indicaciones de Cuidados</strong>
      </div>
      <div class="col-lg-2 col-sm-5 ms-3">
        <img src="{{asset('imagenes/preregistro/cinco.png')}}" alt="" class="imagen_pasos"><br>
        <img src="{{asset('imagenes/preregistro/tache.png')}}" alt="" class="imagen_pasos"><br>
        <strong class="nombre_categoria">Requisitos de Inscripción</strong>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center mt-4">
    <button class="btn btn-success col-md-2 p-2 mt-4 empezar_btn" disabled>Empezar</button>
  </div>
  <br><br>
  </form>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
<script>
$( ".datepicker" ).datepicker({
    format: 'dd/mm/yyyy',
    language: 'es',
});
</script>
  {{-- Fin de Input --}}

  </body>
</html>
