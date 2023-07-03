@php
    $title='Inicio'
@endphp
<nav class="navbar navbar-expand-lg" style="background: linear-gradient(to right, #00A388, #3BBDA6, #76D7C4);">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">{{config('app.name')}} - {{$title}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Sesiones</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <div class="ml-auto">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Menú
              </a>
            </div>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Opción 1</a></li>
              <li><a class="dropdown-item" href="#">Opción 2</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Opción 3</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>