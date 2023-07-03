<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('cdn.bootstrapcss')
    <title>Document</title>
</head>
<body>
    @include('nav-home')
    <main>
    
        <div class="container d-flex justify-content-center pt-5" style="max-width: 500px;">
            <img src="{{url('../image/fitcenter-high-resolution-logo-color-on-transparent-background.png')}}" alt="Descripción de la imagen" class="img-fluid" style="width: 100%;">
        </div>
    </main>
    @include('../cdn/bootstrapscrip')
</body>
</html>