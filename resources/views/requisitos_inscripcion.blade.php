<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Indicaciones de Cuidados</title>
    <link rel="shortcut icon" href="{{ asset('imagenes/logo3.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/preregistro/registro_inscripcion.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/modales_inscripciones.js') }}"></script>

</head>
<input type="hidden" id="acta_nacimiento" value="{{$documentos->acta_nacimiento}}">
<input type="hidden" id="acta_nacimiento_t1" value="{{$documentos->acta_nacimiento_t1}}">
<input type="hidden" id="acta_nacimiento_t2" value="{{$documentos->acta_nacimiento_t2}}">
<input type="hidden" id="certificado_medico" value="{{$documentos->certificado_medico}}">
<input type="hidden" id="cartilla_vacunacion" value="{{$documentos->cartilla_vacunacion}}">
<input type="hidden" id="identificacion_oficial_t1" value="{{$documentos->identificacion_oficial_t1}}">
<input type="hidden" id="identificacion_oficial_t2" value="{{$documentos->identificacion_oficial_t2}}">
<input type="hidden" id="curp" value="{{$documentos->curp}}">
<input type="hidden" id="curp_t1" value="{{$documentos->curp_t1}}">
<input type="hidden" id="curp_t2" value="{{$documentos->curp_t2}}">
<input type="hidden" id="otro" value="{{$documentos->otro}}">

    <body>
        {{-- Header --}}
        <div class="header">
            <div class="row col-12 text-center justify-content-center">
                <div class="col-2">
                    <img src="{{ asset('imagenes/preregistro/uno.png') }}" alt="" class="imagen_pasos">
                </div>
                <div class="col-2">
                    <img src="{{ asset('imagenes/preregistro/dos.png') }}" alt="" class="imagen_pasos">
                </div>
                <div class="col-2">
                    <img src="{{ asset('imagenes/preregistro/tres.png') }}" alt="" class="imagen_pasos">
                </div>
                @if ($aspirante->id_grado <= 5)
                    <div class="col-2">
                        <img src="{{ asset('imagenes/preregistro/cuatro.png') }}" alt=""
                            class="imagen_pasos">
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('imagenes/preregistro/cinco.png') }}" alt=""
                            class="imagen_pasos">
                    </div>
                @else
                    <div class="col-2">
                        <img src="{{ asset('imagenes/preregistro/cuatro_naranja.png') }}" alt=""
                            class="imagen_pasos">
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
                                    <a href="{{ url('aspirantes_preregistro', $id_aspirante) }}"
                                        style="display:block;margin-bottom:2rem; text-decoration: none; font-weight:bold; color:#144580">
                                        <span style="color:red; font-weight:bold; ">
                                            <svg style="width: 1.5rem;" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="3"
                                                stroke="currentColor">
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
            <h4 class="titulo text-center mt-2">Requisitos de Inscripción</h4>
            <div class="card">
                <div class="card-header titulo text-center text-white">Documentación</div>
                <br>
                {{--  --}}
                <form action="{{ url('editar_archivos_inscripcion', $id_aspirante) }}" method="post"
                    id="formulario" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="porcentaje" value="0">
                    <input type="hidden" name="cuenta_beca" value="0">
                    <center>
                        <div class="row">
                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <label class="p-2" for="">Acta de nacimiento del alumno</label><br>
                                <div class="archivo_select div_acta_alumno" id="nombre_file" style={{estilos_documentos($documentos->acta_nacimiento)}} >
                                    <input type="file" name="archivo_acta" class="archivo_acta"
                                        aria-label="Archivo" onchange="mostrarTexto(this)">
                                    <span id="texto_archivo">{{$documentos->acta_nacimiento != null ? 'Archivo Cargado' : 'Adjuntar archivo' }}</span>
                                </div>
                            </div>
                            {{-- Mostrar el acta de nacimiento del tutor solo una vez --}}
                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <label for="" class="p-2">Acta de nacimiento del tutor 1</label>
                                <span class="badge bg-danger ver_acta" role="button">Ver</span><br>
                                <div class="archivo_select div_acta_t1" id="nombre_file" style={{estilos_documentos($documentos->acta_nacimiento_t1)}}>
                                    <input type="file" name="archivo_acta_t1" class="archivo_acta_t1"
                                        aria-label="Archivo" onchange="mostrarTexto(this)">
                                    <span id="texto_archivo">{{$documentos->acta_nacimiento_t1 != null ? 'Archivo Cargado' : 'Adjuntar archivo'}}</span>
                                </div>
                            </div>
                            @if ($papa == 1)
                                 <div class="col-xs-3 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <label for="" class="p-2">Acta de nacimiento del tutor 2</label>
                                <span class="badge bg-danger ver_acta" role="button">Ver</span><br>
                                <div class="archivo_select div_acta_t2" id="nombre_file" style={{estilos_documentos($documentos->acta_nacimiento_t2)}}>
                                    <input type="file" name="archivo_acta_t2" class="archivo_acta_t2"
                                        aria-label="Archivo" onchange="mostrarTexto(this)">
                                        <span id="texto_archivo">{{$documentos->acta_nacimiento_t2 != null ? 'Archivo Cargado' : 'Adjuntar archivo'}}</span>
                                </div>
                            </div>
                            @endif
                           

                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <label for="" class="p-2">Certificado médico del pediatra </label>
                                <span class="badge bg-danger ver_certificado" role="button">Ver</span><br>
                                <div class="archivo_select div_certificado" id="nombre_file" style={{estilos_documentos($documentos->certificado_medico)}}>
                                    <input type="file" name="archivo_certificado" class="archivo_certificado"
                                        aria-label="Archivo" onchange="mostrarTexto(this)">
                                        <span id="texto_archivo">{{$documentos->certificado_medico != null ? 'Archivo Cargado' : 'Adjuntar archivo'}}</span>
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <label for="" class="p-2">Cartilla de vacunación</label><span
                                    class="badge bg-danger ver_cartilla" role="button">Ver</span><br>
                                <div class="archivo_select div_cartilla" id="nombre_file" style={{estilos_documentos($documentos->cartilla_vacunacion)}}>
                                    <input type="file" name="archivo_cartilla" class="archivo_cartilla"
                                        aria-label="Archivo" onchange="mostrarTexto(this)">
                                        <span id="texto_archivo">{{$documentos->cartilla_vacunacion != null ? 'Archivo Cargado' : 'Adjuntar archivo'}}</span>
                                </div>
                            </div>

                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <label for="" class="p-2">Identificación oficial del tutor 1</label>
                                <span class="badge bg-danger ver_identificacion1" role="button">Ver</span><br>
                                <div class="archivo_select div_identificacion_t1" id="nombre_file" style={{estilos_documentos($documentos->identificacion_oficial_t1)}}>
                                    <input type="file" name="archivo_identificacion_t1"
                                        class="archivo_identificacion_t1" aria-label="Archivo"
                                        onchange="mostrarTexto(this)">
                                        <span id="texto_archivo">{{$documentos->identificacion_oficial_t1 != null ? 'Archivo Cargado' : 'Adjuntar archivo'}}</span>
                                </div>
                            </div>
                            @if ($papa == 1)
                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <label for="" class="p-2">Identificación oficial del tutor 2</label>
                                    <span class="badge bg-danger ver_identificacion2" role="button">Ver</span><br>
                                <div class="archivo_select div_identificacion_t2" id="nombre_file" style={{estilos_documentos($documentos->identificacion_oficial_t2)}}>
                                    <input type="file" name="archivo_identificacion_t2"
                                        class="archivo_identificacion_t2" aria-label="Archivo"
                                        onchange="mostrarTexto(this)">
                                        <span id="texto_archivo">{{$documentos->identificacion_oficial_t2 != null ? 'Archivo Cargado' : 'Adjuntar archivo'}}</span>
                                </div>
                            </div>
                            @endif
                            


                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <label for="" class="p-2">CURP del alumno</label><br>
                                <div class="archivo_select div_curp_alumno" id="nombre_file" style={{estilos_documentos($documentos->curp)}}>
                                    <input type="file" name="archivo_curp_alumno" class="archivo_curp_alumno"
                                        aria-label="Archivo" onchange="mostrarTexto(this)">
                                        <span id="texto_archivo">{{$documentos->curp != null ? 'Archivo Cargado' : 'Adjuntar archivo'}}</span>
                                </div>
                            </div>

                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <label for="" class="p-2">CURP del tutor 1</label><br>
                                <div class="archivo_select div_curp_t1" id="nombre_file" style={{estilos_documentos($documentos->curp_t1)}}>
                                    <input type="file" name="archivo_curp_t1" class="archivo_curp_t1"
                                        aria-label="Archivo" onchange="mostrarTexto(this)">
                                        <span id="texto_archivo">{{$documentos->curp_t1 != null ? 'Archivo Cargado' : 'Adjuntar archivo'}}</span>
                                </div>
                            </div>
                            @if ($papa == 1)
                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <label for="" class="p-2">CURP de tutor 2</label><br>
                                <div class="archivo_select div_curp_t2" id="nombre_file" style={{estilos_documentos($documentos->curp_t2)}}>
                                    <input type="file" name="archivo_curp_t2" class="archivo_curp_t2"
                                        aria-label="Archivo" onchange="mostrarTexto(this)">
                                        <span id="texto_archivo">{{$documentos->curp_t2 != null ? 'Archivo Cargado' : 'Adjuntar archivo'}}</span>
                                </div>
                            </div>
                            @endif
                            

                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <label for="" class="p-2">Otro</label><br>
                                <div class="archivo_select div_otro" id="nombre_file" style={{estilos_documentos($documentos->otro)}}>
                                    <input type="file" name="otro" class="archivo_otro"
                                        aria-label="Archivo" onchange="mostrarTexto(this)">
                                    <span id="texto_archivo">Adjuntar archivo</span>
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <label for="" class="p-2">Fotografías</label>
                                <p>* Presentar en el plantel 3 fotografías tamaño infantil a color del alumno para
                                    los
                                    grados de Kínder y Prefirst</p>
                            </div>
                        </div>
                    </center>

            </div>
            <div class="text-center">
                <br>
                <button type="button" class="btn col-md-3 p-2 boton_guardar">Continuar</button>
                <br><br>
            </div>
            {{--  --}}
            <!-- Modal aviso de conformidad -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background:#E12A26">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Oficio de veracidad</h5>
                            <img src="{{ asset('imagenes/preregistro/icono_cerrar.png') }}" alt="cerrar"
                                style="position: absolute; top: 10px; right: 10px; cursor: pointer; width:40px"
                                data-bs-dismiss="modal">
                        </div>
                        <div class="modal-body" style="background-color: #FAD4D5;">
                            <div class="row">
                                <div class="col-1 col-md-1">
                                    <p>Yo</p>
                                </div>
                                <div class="col-11 col-md-5">
                                    <input type="text" class="form-control"
                                        value="{{ $padres[0]->nombre_tutor }}">
                                </div>
                                <div class="col-1 col-md-1">
                                    <p>y</p>
                                </div>
                                <div class="col-11 col-md-5">
                                    <input type="text" class="form-control"
                                        value="{{ $padres[1]->nombre_tutor }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 col-md-2">
                                    <p>tutores de:</p>
                                </div>
                                <div class="col-10 col-md-10">
                                    <input type="text" class="form-control"
                                        value="{{ $aspirante->nombre_aspirante }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-start">
                                    <p>admito(s) y confirmo(s) haber leído y entendido el reglamento interno, el calendario escolar y el aviso de privacidad de la Escuela 
                                        Moms & Tots, para este ciclo escolar.
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-start">
                                    <p>Acepto que cualquier falsedad en la información proporcionada en los
                                        siguientes
                                        documentos puede resultar en la cancelación de la inscripción de mi hijo/a
                                        en la
                                        escuela:</p>
                                </div>
                            </div>
                            <div>
                                <ol class="list-group list-group-numbered text-start">
                                    <li class="list-group-item  border-0" style="background-color: #FAD4D5">Ficha
                                        de
                                        Inscripción</li>
                                    <li class="list-group-item  border-0" style="background-color: #FAD4D5">
                                        Autorización
                                        de Traslado</li>
                                    <li class="list-group-item  border-0" style="background-color: #FAD4D5">
                                        Cuestionario
                                        de Salud</li>
                                    @if ($aspirante->id_grado < 5)
                                        <li class="list-group-item  border-0" style="background-color: #FAD4D5">
                                            Indicaciones de Cuidados</li>
                                    @endif
                                </ol>
                            </div>
                            <div class="row">
                                <div class="col-12 text-start">
                                    <p> He revisado detenidamente el reglamento interno de la institución educativa
                                        y me
                                        comprometo a cumplir con todas las normativas políticas y procedimientos
                                        establecidos para garantizar un ambiente seguro, respetuoso y propicio para
                                        el
                                        aprendizaje de mi hijo/a. De misma forma he revisado el calendario escolar
                                        proporcionado por la escuela y entiendo las fechas de inicio y fin de ciclo
                                        escolar,
                                        así como los días festivos, vacaciones, días de receso y eventos escolares
                                        importantes.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-start">
                                    <p>Declaro que toda la información proporcionada en los documentos de
                                        inscripción es
                                        verídica, precisa y completa.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-start">
                                    <p> Firmo este documento de conformidad.
                                    </p>
                                </div>
                            </div>
                            <div class="row my-4 justify-content-center text-center">
                                <div>Firma Digital de Padre / Madre / Tutor</div>
                                <div id="form">
                                    <input type="hidden" name="base64" id="base64">
                                    <canvas id="canvas"></canvas>
                                    <br>
                                    <button type="button" id="btnLimpiar" class="btn text-white"
                                        style="background-color: #E12A26">Limpiar</button>
                                    <button type="button" class="btn firma_guardar text-white"
                                        style="background-color: #E12A26" disabled>Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Fin Modal --}}

            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        <script src="{{ asset('js/preregistro/firma.js') }}"></script>
    </body>
{{-- ------------------------------------------------------------------------------------------------------------------------------------------------- --}}
<script>
    // Valida si se subieron nuevos archivos o ya no es necesario
    $("#canvas").on("click",function(){
        $(".firma_guardar ").prop("disabled",false)
    });
    $("#btnLimpiar").on("click",function(){
        $(".firma_guardar").prop("disabled",true);
    })

        // Valida si se subieron nuevos archivos o ya no es necesario
    $(".boton_guardar").on("click", function() {
        var archivo_acta = $("input[name=archivo_acta]").val();
        archivo_acta = archivo_acta.length > 0 ? archivo_acta : $("#acta_nacimiento").val();

        var archivo_acta_t1 = $("input[name=archivo_acta_t1]").val();
        archivo_acta_t1 = archivo_acta_t1.length > 0 ? archivo_acta_t1 : $("#acta_nacimiento_t1").val()

        var archivo_acta_t2 = $("input[name=archivo_acta_t2]").val();
        archivo_acta_t2 = archivo_acta_t2.length > 0 ? archivo_acta_t2 : $("#acta_nacimiento_t2").val();

        var archivo_certificado = $("input[name=archivo_certificado]").val();
        archivo_certificado = archivo_certificado.length > 0 ? archivo_certificado : $("#certificado_medico").val();

        var archivo_cartilla = $("input[name=archivo_cartilla]").val();
        archivo_cartilla = archivo_cartilla.length > 0 ? archivo_cartilla : $("#cartilla_vacunacion").val();

        var archivo_identificacion_t1 = $("input[name=archivo_identificacion_t1]").val();
        archivo_identificacion_t1 = archivo_identificacion_t1.length > 0 ? archivo_identificacion_t1 : $("#identificacion_oficial_t1").val();

        var archivo_identificacion_t2 = $("input[name=archivo_identificacion_t2]").val();
        archivo_identificacion_t2 = archivo_identificacion_t2.length > 0 ? archivo_identificacion_t2 : $("#identificacion_oficial_t2").val();

        var archivo_curp_alumno = $("input[name=archivo_curp_alumno]").val();
        archivo_curp_alumno = archivo_curp_alumno.length > 0 ? archivo_curp_alumno : $("#curp").val();

        var archivo_curp_t1 = $("input[name=archivo_curp_t1]").val();
        archivo_curp_t1 = archivo_curp_t1.length > 0 ? archivo_curp_t1 : $("#curp_t1").val();

        var archivo_curp_t2 = $("input[name=archivo_curp_t2]").val();
        archivo_curp_t2 = archivo_curp_t2.length > 0 ? archivo_curp_t2 : $("#curp_t2").val();
        
        $("#exampleModal").modal('show')
        // if (archivo_acta.length > 0 && archivo_acta_t1.length > 0 &&
        //     archivo_acta_t2.length > 0 && archivo_certificado.length > 0 && archivo_cartilla.length > 0 &&
        //     archivo_identificacion_t1.length > 0 &&
        //     archivo_identificacion_t2.length > 0 && archivo_curp_alumno.length > 0 && archivo_curp_t1.length >
        //     0 && archivo_curp_t2.length > 0) {
        //     $("#exampleModal").modal('show')
        // } else {
        //     Swal.fire({
        //         title: "Datos Inconclusos",
        //         text: "Asegurate de que todos los archivos esten cargados",
        //         icon: "error",
        //         confirmButtonColor: "#C9D358",
        //         background: "#144580",
        //         color: '#fff',
        //     });
        // }
    });

    // Función para manejar el cambio en la selección de archivos
    function mostrarTexto(input) {
        var texto = input.nextElementSibling;
        var divPadre = input.closest('.archivo_select'); // Obtener el div padre

        texto.innerText = input.files.length > 0 ? 'Archivo Cargado' : 'Adjuntar archivo';
        divPadre.style.backgroundColor = input.files.length > 0 ? '#DFEBF7' :
            '#FAD4D5'; // Cambiar el color de fondo del div padre
    }

    var inputs = document.querySelectorAll('.archivo_select input[type="file"]');
    inputs.forEach(function(input) {
        input.addEventListener('change', function() {
            mostrarTexto(this); // Pasar 'this' como argumento para referenciar el input
        });
    });

    // Firma
    $(".firma_guardar").on("click", function() {
        Swal.fire({
            title: 'Guardando Archivos',
            allowEscapeKey: false,
            allowOutsideClick: false,
            background: "#144580",
            color: "#fff",
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading()
            },
        });
        var id = {{ $id_aspirante }};
        var _token = "{{ csrf_token() }}";
        var formData = new FormData();
        var str = $("#base64").val();
        var image = base64ImageToBlob(str);
        formData.append('imagen', image, 'imagen.png');
        formData.append('id', id)
        formData.append('_token', _token)
        
        $.ajax({
            type: 'post',
            url: '{{ url('guardar_firma') }}',
            data: formData,
            contentType: false,
            processData: false,
            async: false,

            success: function(response) {
                $("#formulario").submit();
            }
        });
    });

    function base64ImageToBlob(str) {
        // extract content type and base64 payload from original string
        var pos = str.indexOf(';base64,');
        var type = str.substring(5, pos);
        var b64 = str.substr(pos + 8);
        // decode base64
        var imageContent = atob(b64);
        // create an ArrayBuffer and a view (as unsigned 8-bit)
        var buffer = new ArrayBuffer(imageContent.length);
        var view = new Uint8Array(buffer);
        // fill the view, using the decoded base64
        for (var n = 0; n < imageContent.length; n++) {
            view[n] = imageContent.charCodeAt(n);
        }
        // convert ArrayBuffer to Blob
        var blob = new Blob([buffer], {
            type: type
        });
        return blob;
    }
</script>
{{-- Registro Completo --}}
@if (session('exito'))
<script>
    Swal.fire({
        icon: "success",
        title: "Registro Completo",
        background: "#144580",
        color: '#fff',
        text: 'Formato Generado Exitosamente',
        allowOutsideClick: false,
        confirmButtonColor: "#C9D358",
        confirmButtonText: "Continuar",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "{{ url('aspirantes_preregistro', $id_aspirante) }}";
        }
    });
</script>
@endif


</html>
