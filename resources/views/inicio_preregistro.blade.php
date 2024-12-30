<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscripciones</title>
    <link rel="shortcut icon" href="{{ asset('imagenes/logo3.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/preregistro/index.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/preregistro/preregistro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/preregistro/botones.css') }}">
    <script src="{{asset('js/modales_inscripciones.js')}}"></script>
</head>
<body>
    @php
        // $grado = grado_aspirante($id);
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-2 pb-5">
                <nav style="height: 8px !important">
                    <ol class="breadcrumb">
                        <div>
                            <li class="breadcrumb-item">
                                <a href="{{ url('aspirantes_preregistro') }}"
                                    style="display:block;margin-bottom:2rem; text-decoration: none; font-weight:bold; color:#fff">
                                    <span style="color:red; font-weight:bold; ">
                                        <svg style="width: 1.5rem;" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 19.5L8.25 12l7.5-7.5" />
                                        </svg>
                                    </span> Regresar
                                </a>
                            </li>
                        </div>
                    </ol>
                </nav>
            </div>
        </div>     
        <br><br>   
        <h4 class="text-center text-white mt-1">Plantel Seleccionado</h4>
        <div class="d-flex justify-content-center mt-4">
            <div class="row">
                @if ($aspirante->id_pantel == 1)
                    <div class="col-4">
                        <img src="{{ asset('imagenes/sucursal_toluca.png') }}" alt=""
                            class="imagen_sucursal borde">
                    </div>
                @endif
                @if ($aspirante->id_pantel == 2)
                    <div class="col-4">
                        <img src="{{ asset('imagenes/sucursal_santa_fe.png') }}" alt=""
                            class="imagen_sucursal borde">
                    </div>
                @endif
                @if ($aspirante->id_pantel == 3)
                    <div class="col-4">
                        <img src="{{ asset('imagenes/sucursal_metepec.png') }}" alt=""
                            class="imagen_sucursal borde">
                    </div>
                @endif
                @if ($aspirante->id_pantel == 4)
                    <div class="col-4">
                        <img src="{{ asset('imagenes/sucursal_zibata.png') }}" alt=""
                            class="imagen_sucursal borde">
                    </div>
                @endif

            </div>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <div class="row  col-sm-10 col-md-10 col-lg-6 ">
                <div class=" col-sm-12 col-md-8 col-lg-6 ">
                    <h5 class="texto_nacimiento mt-2 text-white">Fecha de nacimiento del aspirante</h5>
                </div>
                <div class="col-md-4 col-sm-12">
                    <input type="text" name="fecha_nacimiento" class="form-control datepicker" id="" value="{{ \Carbon\Carbon::parse($aspirante->fecha_nacimiento)->format('d/m/Y') }}" autocomplete="off">
                </div>
            </div>
        </div>
        </div>        
        <br>
        {{-- Validar grado de kinder --}}
        @include('archivos')
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    {{-- <script src="{{asset('js/preregistro/firma.js')}}"> </script> --}}
</body>
@if (session('error_indicaciones'))
    <script>
        Swal.fire({
            icon: "error",
            title: "No Aplica",
            text: 'Este formato no aplica para aspirantes de kinder',
            allowOutsideClick: false,
            confirmButtonColor: "#C9D358",
            confirmButtonText: "Aceptar",
            background: "#144580",
            color: '#fff',
        });
    </script>
@endif
@if (session('exito'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Archivos Guardados",
            text: 'Archivos Guardados Exitosamente',
            confirmButtonColor: "#C9D358",
            confirmButtonText: "Aceptar",
            background: "#144580",
            color: '#fff',
        });
    </script>
@endif
@if (session('firma'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Formatos Concluidos",
            confirmButtonColor: "#C9D358",
            confirmButtonText: "Aceptar",
            background: "#144580",
            color: '#fff',
        });
    </script>
@endif
<script>
    $(".mensaje").on('click', function() {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: 'Favor de llenar los formatos anteriores',
            confirmButtonColor: "#C9D358",
            background: "#144580",
            color: '#fff',
        });
    });
</script>

</html>
