<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscripciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h2>Aspirantes</h2>
      <a href="{{route('nuevo_aspirante')}}" class="btn btn-outline-primary">Nuevo Registro</a>
      <table class="table">
        <tr>
          <th>Nombre Aspirante</th>
          <th>Grado</th>
          <th>Fecha de nacimiento</th>
          <th>Acciones</th>
        </tr>
        @foreach ($aspirantes as $a)
            <tr>
              <td>{{$a->nombre_general}}</td>
              <td>{{$a->}}</td>
            </tr>
        @endforeach
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>