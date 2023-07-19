@extends('coach.layouts.baselayouts')
@section('section','Sesiones')
@section('title','Sesiones')

@section('additionalCSS')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="container border border-3 shadow p-3 mt-4" id="containerclient" style="min-height:66;max-height:625px; min-width=337px;max-width=929px">
                    @empty(json_decode($clients))
                        <h1>No tiene clientes asociados</h1>
                    @endempty


                    <div class="d-none d-md-block ">
                        <input type="text" id="searchInput" class="form-control" placeholder="Buscar cliente...">
                        <table  class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>RUT</th>
                                    <!-- Agrega más columnas según tus necesidades -->
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach (json_decode($clients) as $client)
                                    <tr>
                                        <td>{{$client->id}}</td>
                                        <td>{{$client->name}} {{$client->lastname}}</td>
                                        <td>{{ $client->rut }}</td>
                                        <!-- Agrega más columnas según tus necesidades -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-md-none">
                        <select id="selectClientes" class="form-select">
                            @foreach (json_decode($clients) as $client)
                                <option value="{{$client->id}}">{{$client->name}} {{$client->lastname}}</option>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" id="modalcontent">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Sesion</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="createSessionForm">
              @csrf
              <div class="mb-3">
                <label for="title" class="col-form-label">Titulo</label>
                <input type="text" class="form-control" id="title" name="title">
              </div>
              <div class="mb-3 form-inline">
                <label for="start" class="col-form-label">Inicio</label>
                <input type="datetime-local" class="form-control" id="start" name="start">
                <label for="end" class="col-form-label">Termino</label>
                <input type="datetime-local" class="form-control" id="end" name="end">
              </div>
              <div class="mb-3">
                <label for="" class="col-form-label">Tipo sesion</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tipoSesion" id="radioIndividual" value="individual" checked>
                  <label class="form-check-label" for="radioIndividual">
                    Indivual
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tipoSesion" id="radioGrupal" value="grupal">
                  <label class="form-check-label" for="radioGrupal">
                    Grupal
                  </label>
                </div>
              </div>
              <div class="mb-3" style="display: none" id="membersContainer">
                <label for="cantidadMiembros" >Cantidad de miembros</label>
                <input type="number" class="form-control" id="cantidadMiembros" name="cantidadMiembros">
              </div>
              <div class="mb-3">
                <label for="" class="col-form-label">Modalidad de la sesión</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="modo" id="online" value="online" checked>
                  <label class="form-check-label" for="online">
                    Online
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="modo" id="presencial" value="presencial">
                  <label class="form-check-label" for="presencial">
                    Presencial
                  </label>
                </div>
              </div>
             
              <div class="mb-3" style="display: none" id="direccionContainer">
                <label for="direccion" >Cantidad de miembros</label>
                <input type="number" class="form-control" id="direccion" name="direccion">
              </div>
              <div class="mb-3">
                <label for="selectClient">Clientes</label>
                <select id="selectClient" name="selectClient" class="form-select">
                  <option value="non" selected>Selecciona un cliente</option>
                    @foreach (json_decode($clients) as $client)
                        <option value="{{$client->id}}">{{$client->name}} {{$client->lastname}}</option>
                    @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="" class="col-form-label">Visibilidad</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="visibilidad" id="radioIndividual" value="publica" checked>
                  <label class="form-check-label" for="radioIndividual">
                    Publica
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="visibilidad" id="radioGrupal" value="privada">
                  <label class="form-check-label" for="radioGrupal">
                    Privada
                  </label>
                </div>
              </div>
              
            </form>
            <div class="modal-footer">
              <button type="button" id='close' class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="button" id='crearCita' class="btn btn-success">Ingresar cita</button>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- -->

    <!--Modal eventClick -->

    <div class="modal fade" id="modaleventClick" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">
            <form id="sessionUpdateForm" action="">
                <div class="mb-3">
                  <label for="titleEventupdate" class="col-form-label">Titulo</label>
                  <input type="text" class="form-control" id="titleEventupdate">
                  
                </div>
                <div class="mb-3 form-inline">
                  <label for="start-update" class="col-form-label">Inicio</label>
                  <input type="datetime-local" class="form-control" id="start-update">
                  <label for="end-update" class="col-form-label">Termino</label>
                  <input type="datetime-local" class="form-control" id="end-update">
                </div>
                <div class="mb-3">
                  <label for="" class="col-form-label">Tipo sesion</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipoSesion" id="radioIndividualUpdate" value="individual" checked>
                    <label class="form-check-label" for="radioIndividualUpdate">
                      Indivual
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipoSesion" id="radioGrupalUpdate" value="grupal">
                    <label class="form-check-label" for="radioGrupalUpdate">
                      Grupal
                    </label>
                  </div>
                </div>
                <div class="mb-3" style="display: none" id="membersContainerUpdate">
                  <label for="cantidadMiembros" >Cantidad de miembros</label>
                  <input type="number" class="form-control" id="cantidadMiembros">
                </div>
                <div class="mb-3">
                  <label for="selectClientesUpdate">Clientes</label>
                  <select id="selectClientesUpdate" class="form-select">
                    <option value="non" selected>Selecciona un cliente</option>
                      @foreach (json_decode($clients) as $client)
                          <option value="{{$client->id}}">{{$client->name}} {{$client->lastname}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="mb-3">
                  <label for="" class="col-form-label">Visibilidad</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="visibilidad" id="radioIndividual" value="publica" checked>
                    <label class="form-check-label" for="radioIndividual">
                      Publica
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="visibilidad" id="radioGrupal" value="privada">
                    <label class="form-check-label" for="radioGrupal">
                      Privada
                    </label>
                  </div>
              </div>
              
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="cancelsession">Cancelar</button>
            <button type="button" class="btn btn-warning">Actualizar</button>
            <button type="button" class="btn btn-secondary" id="btn-close-update" data-bs-dismiss="modal">Cerrar</button>
            
          </div>
        </div>
      </div>
    </div>
@endsection
@section('additionalScript')
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
      
  @vite(['resources/js/calendar.js'])
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
@endsection