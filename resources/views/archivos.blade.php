<link rel="stylesheet" href="{{ asset('css/preregistro_inscripciones.css') }}">
<script src="{{asset('js/preguntas_indicaciones.js')}}"></script>
<style>
    .mensaje {
        border: 0
    }

    .archivo_select {
        position: relative;
        display: inline-block;
    }

    .archivo_select::before {
        color: black;
        justify-content: center;
        align-items: center;
        border-radius: 20px;
        /* content: 'Seleccionar'; */
        padding: 5px;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    .archivo_select input[type="file"] {
        opacity: 0;
        width: 200px;
        height: auto;
        display: inline-block;
        font-size: 1.2rem;

    }

    @media (max-width: 700px) {
        .boton_centro {
            display: flex;
            justify-content: center;
        }
    }

    #canvas {
        border: 1px solid #9b9b9b;
    }

    #exampleModalLabel {
        font-size: 2rem;
    }

    .modal-body {
        font-family: 'Futura-Light-Condensed-BT';
        /* font-weight: 600; */
        font-size: 1.4rem;
    }

    .boton_veracidad {
        font-weight: 700;
        font-size: 1.2rem;
    }

    .modal-body div ol {

        line-height: 10px;
        margin-bottom: 1rem;
    }

    .archivo_select {
        position: relative;
        /* Para que el texto absoluto esté posicionado con respecto a este elemento */
        border-radius: 20px;
        overflow: hidden;
        /* Evita que el texto se desborde */
        display: inline-block;
        /* Para que el contenedor se ajuste al tamaño del contenido */
        vertical-align: top;
        /* Para alinear correctamente con el texto y el input */
    }

    .archivo_select input[type="file"] {
        opacity: 0;
        /* Hacemos el input de archivo transparente */
        width: 100%;
        height: 100%;
        position: absolute;
        /* Posición absoluta para que se superponga al texto */
        top: 0;
        left: 0;
    }

    .texto_archivo {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
        /* Para que el texto no interrumpa el clic en el input */
        font-weight: bold;
    }
     .botones_inicio {
        cursor: pointer
     }
</style>
<div class="container text-center justify-content-center">
    <input type="hidden" id="idAspirante" value="{{$id}}">
    <input type="hidden" id="gradoId" value="{{$aspirante->id_grado}}">
    <div>
        <h3 class="text-center p-2">Firmar y Adjuntar los Siguientes Formatos: </h3>
        <br>
                <div class="row" style="text-align: center">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-2">
                        <img src="{{ asset('/storage/preregistro/imagenes/' . $aspirante->id_aspirante . '/' . $aspirante->foto_aspirante) }}"
                            alt="" class="foto">
                        <p>{{ $aspirante->nombre_general }}</p>
                        <br>
                    </div>
                    <div class="col-xs-6 col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('imagenes/preregistro/uno.png') }}" alt=""
                                class="imagen_estado d-block">
                            <img src="{{ asset('imagenes/preregistro/paloma.png') }}" alt=""
                                class="imagen_estado d-block">
                        </div>
                        <p class="nombre_categoria fw-bold">Ficha de Inscripción</p>
                        <a href="#" class="botones_inicio">Editar</a><br>
                        <br><br>
                    </div>
                    <div class="col-xs-6 col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('imagenes/preregistro/dos.png') }}" alt="" class="imagen_estado">
                            @if ($documentos->pdf_translado != null)
                                <img src="{{ asset('imagenes/preregistro/paloma.png') }}" alt=""
                                    class="imagen_estado">
                                <p class="nombre_categoria fw-bold">Autorización de Traslado</p>
                                <a href="#"
                                    class="botones_inicio">Editar</a>
                            @else
                                <img src="{{ asset('imagenes/preregistro/tache.png') }}" alt=""
                                    class="imagen_estado">
                                <p class="nombre_categoria fw-bold">Autorización de Traslado</p>
                                <a href="{{ url('autorizacion_traslado', $aspirante->id_aspirante) }}"
                                    class="botones_inicio">Comenzar</a><br>
                            @endif
                        </div>
                        <br><br>
                    </div>
                    <div class="col-xs-6 col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('imagenes/preregistro/tres.png') }}" alt=""
                                class="imagen_estado">
                            @if ($documentos->pdf_inscripcion != null && $documentos->pdf_translado != null)
                                @if ($documentos->pdf_medicos != null)
                                    <img src="{{ asset('imagenes/preregistro/paloma.png') }}" alt=""
                                        class="imagen_estado">
                                    <p class="nombre_categoria fw-bold">Cuestionario de Salud</p>
                                    <a href="#" class="botones_inicio">Editar</a>
                                @else
                                    <img src="{{ asset('imagenes/preregistro/tache.png') }}" alt=""
                                        class="imagen_estado">
                                    <p class="nombre_categoria fw-bold">Cuestionario de Salud</p>
                                    <a href="{{ url('cuestionario_salud', $aspirante->id_aspirante) }}"
                                        class="botones_inicio">Comenzar</a><br>
                                @endif
                            @else
                                <img src="{{ asset('imagenes/preregistro/tache.png') }}" alt=""
                                    class="imagen_estado">
                                <p class="nombre_categoria p-1 fw-bold">Cuestionario de Salud</p>
                                <button type="button" class=" botones_inicio mensaje">Comenzar</button>
                            @endif
                        </div>

                        <br><br>
                    </div>
                    @if ($aspirante->id_grado <= 5)
                        <div class="col-xs-6 col-sm-12 col-md-12 col-lg-2 col-xl-2">
                            <div class="d-flex flex-column align-items-center">
                                <img src="{{ asset('imagenes/preregistro/cuatro.png') }}" alt=""
                                    class="imagen_estado">
                                @if ($documentos->pdf_inscripcion != null && $documentos->pdf_translado && $documentos->pdf_medicos)
                                    @if ($documentos->pdf_indicaciones != null)
                                        <img src="{{ asset('imagenes/preregistro/paloma.png') }}" alt=""
                                            class="imagen_estado">
                                        <p class="nombre_categoria fw-bold">Indicaciones de Cuidados</p>
                                        <a href="#" class="botones_inicio">Editar</a>
                                    @else
                                    @if ($aspirante->id_grado <= 3)
                                    <img src="{{ asset('imagenes/preregistro/tache.png') }}" alt=""
                                    class="imagen_estado">
                                    <p class="nombre_categoria fw-bold">Indicaciones de Cuidados</p>
                                    <a class="botones_inicio modal_indicaciones">Comenzar</a><br>
                                    @else
                                    <img src="{{ asset('imagenes/preregistro/tache.png') }}" alt=""
                                    class="imagen_estado">
                                    <p class="nombre_categoria fw-bold">Indicaciones de Cuidados</p>
                                    <a class="botones_inicio" href="{{url('indicaciones_cuidados',$aspirante->id_aspirante)}}">Comenzar</a><br>
                                    @endif
                                        
                                    @endif
                                @else
                                    <img src="{{ asset('imagenes/preregistro/tache.png') }}" alt=""
                                        class="imagen_estado">
                                    <p class="nombre_categoria fw-bold">Indicaciones de Cuidados</p>
                                    <button type="button" class=" botones_inicio mensaje">Comenzar</button>
                                @endif
                            </div>
                            <br><br>
                        </div>
                    @endif
                    <div class="col-xs-6 col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ $aspirante->id_grado <= 5 ? asset('imagenes/preregistro/cinco.png') : asset('imagenes/preregistro/cuatro_naranja.png')  }}" alt=""
                                    class="imagen_estado">
                                    {{-- Validar que sea maternal o kinder y si los pasos anteriores estan llenos, si falta alguno te envia un mensaje de llenado --}}
                                    @if ($aspirante->id_grado <= 5 ) 
                                        @if ($documentos->pdf_inscripcion != null && $documentos->pdf_translado && $documentos->pdf_medicos && $documentos->pdf_indicaciones)

                                            @if ($documentos->pdf_conformidad != null)
                                            <img src="{{ asset('imagenes/preregistro/paloma.png') }}" alt="" class="imagen_estado ">
                                                <p class="nombre_categoria fw-bold">Requisitos de Inscripción</p>
                                                <a href="#" class="botones_inicio">Editar</a>
                                            @else
                                            <img src="{{ asset('imagenes/preregistro/tache.png') }}" alt=""
                                                class="imagen_estado ">
                                                <p class="nombre_categoria fw-bold">Requisitos de Inscripción</p>
                                            <a href="{{ url('requisitos_inscripcion', $aspirante->id_aspirante) }}"
                                                class="botones_inicio">Comenzar</a>
                                            @endif
                                        @else
                                        <img src="{{ asset('imagenes/preregistro/tache.png') }}" alt="" class="imagen_estado">
                                        <p class="nombre_categoria fw-bold">Requisitos de Inscripción</p>
                                        <button type="button" class=" botones_inicio mensaje">Comenzar</button>
                                        @endif
                                    @else
                                        @if ($documentos->pdf_inscripcion != null && $documentos->pdf_translado && $documentos->pdf_medicos)

                                            @if ($documentos->pdf_conformidad != null)
                                            <img src="{{ asset('imagenes/preregistro/paloma.png') }}" alt="" class="imagen_estado ">
                                                <p class="nombre_categoria fw-bold">Requisitos de Inscripción</p>
                                                <a href="#" class="botones_inicio">Editar</a>
                                            @else
                                            <img src="{{ asset('imagenes/preregistro/tache.png') }}" alt=""
                                                class="imagen_estado ">
                                                <p class="nombre_categoria fw-bold">Requisitos de Inscripción</p>
                                            <a href="{{ url('requisitos_inscripcion', $aspirante->id_aspirante) }}"
                                                class="botones_inicio">Comenzar</a>
                                            @endif
                                        @else
                                        <img src="{{ asset('imagenes/preregistro/tache.png') }}" alt="" class="imagen_estado">
                                        <p class="nombre_categoria fw-bold">Requisitos de Inscripción</p>
                                        <button type="button" class=" botones_inicio mensaje">Comenzar</button>
                                        @endif
                                    @endif
                        </div>
                        <br><br>
                    </div>
                </div>
                @if ($aspirante->activo == 0 && $documentos->pdf_conformidad != null)    
                <div class="col-12">
                    <a href="{{url('validacion_preregistro/'.$aspirante->id_aspirante)}}" class="col-3 btn btn-primary">Enviar registro</a>
                </div>
                <br><br><br>
                @endif
            </div>
{{-- Registro Completo --}}
@if(session('validacion_preregistro'))
<script>
    Swal.fire({
    icon: "success",
    title: "Archivos Guardados",
    background:"#144580",
    color: '#fff',
    text: 'Para terminar tu proceso de inscripción favor de contactar al plantel',
    confirmButtonColor: "#C9D358",
    confirmButtonText: "Aceptar",
    }).then((result) => {
    if (result.isConfirmed) {
      window.location = "{{url('aspirantes_preregistro')}}";
    }
});
</script>
@endif