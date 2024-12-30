<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h2>Inscripciones</h2>
        <a href="{{route('nuevo_aspirante')}}" class="btn btn-outline-success">Nuevo Aspirante</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">
                {{ __('Log Out') }}
            </button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Domicilio</th>
                    <th>Fecha de nacimiento</th>
                    <th>Documentos</th>
                    {{-- <th>Plantel</th> --}}
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aspirantes as $a)
                    <tr>
                        <td>{{$a->nombre_general}}</td>
                        <td>{{$a->domicilio_aspirante}}</td>
                        <td>{{$a->fecha_nacimiento}}</td>
                        <td>
                            <span class="badge bg-success">1</span>
                        </td>
                        <td>
                            <a href="{{route('inicio_aspirante',$a->id_aspirante)}}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>