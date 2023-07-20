@extends('client.layouts.baselayout')
@section('section','Dashboard')
@section('title','Dashboard')

@section('content')

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
            <div class="col-3">
            Column
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-lg-12"> 1</div>
        </div>
    </div>


    <div class="container">
    <div class="row">
        <div class="col-lg-4 border pr-4 text-center">
                <div class="card mt-3 mb-3">
                    <div class="card-header bg-white " style="">
                    </div>
                    <div class="card-body">
                        @foreach ($sessions as $sesion)
                            <div class="card m-3">
                                <div class="card-header bg-white">
                                    <h3>{{$sesion->title}}</h3>
                                </div>
                                <div class="card-body">
                                    <p></p>
                                    <div class="d-inline">
                                        <label for="start">Inicio</label>
                                        <p id="start">{{$sesion->start}}</p>
                                        <label for="end">Termino</label>
                                        <p id="end">{{$sesion->end}}</p>
                                        <label for="entrenador">Entrenador</label>
                                        <p id="entrenador">{{$sesion->namecoach}} {{$sesion->lastnamecoach}}</p>
                                        <label for="modalidad">Modalidad</label>
                                        <p id="modalidad">{{$sesion->mode}}</p>
                                    </div>
                                    
                                </div>
                            </div>
                        @endforeach
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

@endsection