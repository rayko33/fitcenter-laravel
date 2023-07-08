@php
    $title='Perfil'
   
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/dashboar.css'])
    @include('../cdn/bootstrapcss')
    @include('../cdn/bootstrapscrip')
    <title>Document</title>
    
</head>
<body>
    @include('coach.partial.navbar')
    
    <div class="container-fluid mt-5">
        <div class="row">
          <div class="col-12 col-lg-2 justify-content-center">
            <nav class="nav flex-column">
              <a class="nav-link active" aria-current="page" href="#">Informacion general</a>
              <a class="nav-link" href="#">Link</a>
              <a class="nav-link" href="#">Link</a>
              <a class="nav-link disabled">Disabled</a>
            </nav>
          </div>
          <div class="col-12 col-md-9 shadow p-3 mt-3">
            <div class="row">
                <div class="col-2 ">
                    <div class="col-md-2 mr-1">
                        <div class="rounded-circle  border justify-content-center" style="max-height:75px;max-width: 75px; min-width: 74px; min-height: 75px; background: url({{url('/image/account.png')}})"></div>
                    </div>
                    
                </div>
                <div class="col-10  shadow p-3">
                  
                  @if ($profile->about_me==null)
                    <h5>Sin informacion</h5>
                  @else
                    {{$profile->about_me}}
                  @endif
                  
                
                </div>
            </div>
          </div>
        </div>
      </div>
   

</body>
</html>