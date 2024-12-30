<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <style>
        /* @font-face {
            font-family: 'Futura Light Condensed BT';
            font-style: normal;
            font-weight: normal;
            src: url("/fonts/Futura-Light-Condensed-BT.ttf") format('truetype');
        }
        @font-face {
            font-family: "Futura Bold Condensed BT V2";
            font-style: normal;
            font-weight: normal;
            src: url("/fonts/Futura_Bold_Condensed_BT.ttf") format('truetype');
        } */

        @page{
            margin: none;
            font-family: "Helvetica";
            line-height: initial;
        }
        body{
            /* background-image: url("{{asset('imagenes/fondos_pdfs/oficio_veracidad.jpg')}}");
            background-position: center;
            background-repeat:no-repeat;
            background-size:100% 100%; */
            font-size: 19px;
        }
        .container {
            position: fixed;
            margin: 134px 0px 600px 60px;
            width: 87%;
        }
        .image_logo{
            position: fixed;
            align-items: center;
            width: 30rem;
            height: 6rem;
            margin: 50px 80px 0px 150px;
        }
        h4{
            font-family: "Helvetica";
            line-height: initial;
            text-align: center;
            padding: 10px 0 0 0;
        }

        .firma{
            text-align: center;
            padding: 10px 0 0 0;
        }
        #firma{
            margin: 0 0 0 170px;
            width: 350px;
            height: 50px;
        }
        .textos{
            height: auto;
            width: 280px;
            /* bottom: .5rem; */
            right: 1rem;
            margin-bottom: -5px;
            font-family: "Arial";
            font-size: 0.9rem
        }
        /* input{
            
        } */
    </style>
</head>
<body>
    <div class="container">
        <div id="row">
            <img src="imagenes/logo2.png" class ="image_logo" >
            <h4>OFICIO DE VERACIDAD</h4>
            <p>
                Yo <input type="text" class="textos" value="{{$padres[0]->nombre_tutor}}"> y  <input type="text" class="textos" value="{{$padres[1]->nombre_tutor}}" > tutores de
                <input type="text" class="textos" value="{{ $aspirante->nombre_aspirante }}"> admito(s) y confimo(s) haber leído y entendido el reglamento interno, el calendario escolar y el aviso de privacidad de la Escuela Moms & Tots, para este ciclo escolar.
            </p>
            <p style="margin-top: -15px">
                Acepto que cualquier falsedad en la información proporcionada en los siguientes documentos puede resultar en la cancelación de la
                inscripción de mi hijo/a en la escuela:
            </p>
            <p class="lista" style="margin-top: -15px">
                1.- Ficha de Inscripción <br>
                2.- Autorización de Traslado <br>
                3.- Cuestionario de Salud<br>
                @if ($aspirante->id_grado < 5)
                4.- Indicaciones de Cuidado<br>
                @endif
            </p>
            <p class="" style="margin-top: -15px">
                He revisado detenidamente el reglamento interno de la institución educativa y me comprometo a cumplir con todas las normativas políticas
                y procedimientos establecidos para garantizar un ambiente seguro, respetuoso y propicio para el aprendizaje de mi hijo/a. De misma forma
                he revisado el calendario escolar proporcionado por la escuela y entiendo las fechas de inicio y fin de ciclo escolar, así como los días festivos, vacaciones, días de receso y eventos escolares importantes.
            </p>
            <p>
                Declaro que toda la información proporcionada en los documentos de inscripción y en este oficio de veracidad es verídica, precisa y completa.
            </p>
            <p>
                Firmo este documento de conformidad.
            </p>
            <p class="firma">
                Firma Digital de Padre / Madre / Tutor
            </p>
            <div style="text-align:center">
                <img src="{{$base64}}" alt="" style="height: 120px; border: 1px solid #dcdcdc">
            </div>
        </div>
    </div>
</body>

</html>
