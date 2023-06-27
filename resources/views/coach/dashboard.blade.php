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

        <div>{{Auth::user()}}</div>

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
                          <h2 class="card-title" >0</h2>
                          <a href="{{route('clientes')}}" class="card-link " align='center'>Ver tus clientes</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                  Column
                </div>
            </div>
            
        </div>
    @include('cdn.bootstrapscrip')
</body>
</html>