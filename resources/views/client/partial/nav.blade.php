<nav class="navbar navbar-expand-lg " style="background: linear-gradient(to right, #00A388, #3BBDA6, #76D7C4);">
    <div class="container-fluid">
      
      <a class="navbar-brand text-white" href="{{route('coachdashbord')}}">{{config('app.name')}} - @yield('section')</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center"  id="navbarNav" >
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="{{route('dashbordclient')}}">Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <button class="btn dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
              Entrenadores
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('client.trainers')}}">Mis entrenadores</a></li>
              <li><a class="dropdown-item " href="{{route('client.searchtrainers')}}">Buscar entrenadores</a></li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{route('client.sesions')}}">Sesiones</a>
          </li>
          <li class="nav-item dropdown">
            <button class="btn dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
              Opciones
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Mi informacion</a></li>
              <li><a class="dropdown-item text-danger" href="{{route('logoutclient')}}">Cerrar sesión</a></li>
              
            </ul>
          </li>
        
        </ul>
      </div>
      
    </div>
  </nav>