<nav class="navbar navbar-expand-lg " style="background: linear-gradient(to right, #00A388, #3BBDA6, #76D7C4);">
    <div class="container-fluid">
      
      <a class="navbar-brand text-white" href="{{route('coachdashbord')}}">{{config('app.name')}} - Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center"  id="navbarNav" >
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="{{route('coachdashbord')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{route('clientes')}}">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Citas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="{{route('logoutclient')}}">Logout</a>
          </li>
        </ul>
      </div>
      
    </div>
  </nav>