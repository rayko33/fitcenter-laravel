<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('../../cdn/bootstrapcss')
    
    <title>Document</title>
</head>
<body>
    <form method="GET" action="{{route('register')}}">
        <div class="form-group mb-2">
            <label for="name">Nombre</label>
            <input type="input" class="form-control pt-2" id="name" name="name" aria-describedby="emailHelp" placeholder="Nombre">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>

        <div class="form-group mb-2">
            <label for="lastname">Apellido</label>
            <input type="input" class="form-control pt-2" id="lastname" name="lastname" aria-describedby="emailHelp" placeholder="Apellido">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>

        <div class="form-group mb-2">
            <label for="rut">Rut</label>
            <input type="input" class="form-control pt-2" id="rut" name="rut" aria-describedby="emailHelp" placeholder="Apellido">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>

        <div class="form-group mb-2">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="correo">
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group mb-2">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
      </form>
</body>
</html>