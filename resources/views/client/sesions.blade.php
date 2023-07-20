@extends('client.layouts.baselayout')
@section('section','Mis sesiones')
@section('title','Mis sesiones')
@section('additionalCSS')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="container border border-3 shadow p-3 mt-4" id="containerclient" style="min-height:66;max-height:625px; min-width=337px;max-width=929px">
                    @empty($trainers)
                        <h1>No tiene clientes asociados</h1>
                    @endempty


                    <div class="d-none d-md-block ">
                        <input type="text" id="searchInput" class="form-control" placeholder="Buscar cliente...">
                        <table  class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>status</th>
                                    <!-- Agrega más columnas según tus necesidades -->
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach ($trainers as $trainer)
                                    <tr>
                                        <td>{{$trainer->idcoaches}}</td>
                                        <td>{{$trainer->namecoach}} {{$trainer->lastnamecoach}}</td>
                                        
                                        <!-- Agrega más columnas según tus necesidades -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-md-none">
                        <select id="selectClientes" class="form-select">
                            @foreach ($trainers as $trainer)
                                <option value="{{$trainer->idcoaches}}">{{$trainer->namecoach}} {{$trainer->lastnamecoach}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    
                </div>
            </div>
            <div class="col-md-6">
                <div id="d" class="container-sm border border-3 shadow p-3 mt-4">
                    
                    <div id='calendar'></div>
                    <div id="loader">
                        
                    </div> 
                </div>
            </div>
            
            
        </div>
    </div>

    <div class="modal fade" id="sessionmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="titleSession"></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="col-form-label">Titulo</label>
                    <h2 class="form-control" id="title" name="title"></h2>
                </div>
                <div class="mb-3">
                    <label for="start" class="col-form-label">Inicio</label>
                    <label class="form-control" id="start" name="start"></label>
                </div>
                <div class="mb-3">
                    <label for="end" class="col-form-label">Fin</label>
                    <label class="form-control" id="end" name="end"></label>
                </div>
                <div class="mb-3">
                    <label for="modo" class="col-form-label">Modalidad</label>
                    <label class="form-control" id="modo" name="modo"></label>
                </div>
                <label style="display:none;"id='idsession'></label>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">cerrar</button>
              <button type="button" class="btn btn-danger" id="btn-cancelar">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('additionalScript')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
      
@vite(['resources/js/clientSessions.js'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
@endsection