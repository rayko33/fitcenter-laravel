@php
    $title='Home'
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/dashboar.css'])
    @include('cdn.bootstrapcss')
    
    <title>Document</title>
</head>
<body>
   
    @include('coach.partial.navbar')

        

        <div class="container-lg shadow p-3 mb-5 mt-5">
            <div class="row">
                <div class="col align-items-center">
                    <div class="card shadow p-3 mb-5 mt-5">
                        <div class="card-body">
                          <h5 class="card-title">Special title treatment</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card d-flex text-center shadow p-3 mb-5 mt-5">
                        <div class="card-body">
                          <h5 class="card-title">Usuarios Activos</h5>
                          <h2 class="card-title" >{{$activeClient}}</h2>
                          <a href="{{route('clientes')}}" class="card-link " align='center'>Ver tus clientes</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                  Column
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-lg-12"> 1</div>
            </div>
        </div>
    @include('cdn.bootstrapscrip')

    <div class="container">
        <div class="row">
            <div class="col-lg-4 border pr-4 ">
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Proximas sesiones</h5>
                    </div>
                </div>
                <!-- Contenido de la columna izquierda -->
            </div>
            <div class="col-sm-6 border">
                <h2>Sección en medio</h2>
                <!-- Contenido de la sección en medio -->
            </div>
           
        </div>
    </div>
</body>
</html>