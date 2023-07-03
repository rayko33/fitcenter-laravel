@php
    $title='Sesiones'
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/loader.css'])
    @vite(['resources/css/dashboar.css'])
    @include('../cdn/bootstrapcss')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
    
    @include('coach.partial.navbar')
    
  
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

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Recipient:</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
  </div>


    @include('../cdn/bootstrapscrip')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    
    @vite(['resources/js/calendar.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</body>
</html>

