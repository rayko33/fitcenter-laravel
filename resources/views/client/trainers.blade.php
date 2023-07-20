@extends('client.layouts.baselayout')
@section('section','Mis entrenadores')
@section('title','Mis entrenadores')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="container border border-3 shadow p-3 mt-4" id="containerclient" style="min-height:66;max-height:625px; min-width=337px;max-width=929px">
                @empty($trainers)
                    <h1>No tiene clientes asociados</h1>
                @endempty


                <div class="d-none d-md-block ">
                    <div class="col border">
                        <input type="text" id="searchInput" class="form-control" placeholder="Buscar cliente...">    
                    </div>
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <label for="allclients">Todos</label>
                            <input class="form-check-input" type="radio" value="all" id="allclients" name="clientfilter" checked>

                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="actives">Activos</label>
                            <input class="form-check-input" type="radio" value="active" name="clientfilter" id="actives">
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="inactives">Inactivos</label>
                            <input class="form-check-input" type="radio" value="inactive" name="clientfilter" id="inactives">
                        </div>     
                    </div>
                    <table  class="table table-hover" id="client_table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                
                                <th>Estado</th>
                                <!-- Agrega más columnas según tus necesidades -->
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($trainers as $trainer)
                                <tr>
                                    <td>{{$trainer->idcoaches}}</td>
                                    <td>{{$trainer->namecoach}} {{$trainer->lastnamecoach}}</td>
                                    
                                    @if ($trainer->status=='active')
                                        <td>{{'Activo'}}</td>
                                    @elseif ($trainer->status=='inactive')
                                        <td>{{ 'Inactivo' }}</td>    
                                    @endif
                                    
                                    <!-- Agrega más columnas según tus necesidades -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-md-none d-md-block">
                    <select id="clientsSelect" class="form-select">
                        <option value="0" selected>Seleccione un cliente</option>
                        @foreach ($trainers as $trainer)
                            <option value="{{$trainer->idcoahes}}">{{$trainer->namecoach}} {{$trainer->lastnamecoach}}</option>
                        @endforeach
                    </select>
                </div>
                
                
            </div>
        </div>
        <div class="col-md-6">
            <div id="d" class="container-sm border border-3 shadow p-3 mt-4">
                <button class="btn btn-danger" id='flushtable'>Vaciar tabla</button>
            </div>
        </div>
        
        
    </div>
</div>

@endsection
@section('additionalScript')
    @vite(['resources/js/clientTrainers.js'])
@endsection