<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/dashboar.css'])
    @include('cdn.bootstrapcss')
    <title>Document</title>
</head>
<body>
    @include('coach.partial.navbar')
    <div>{{Auth::user()->idcoaches}}</div>
    <div class="container-lg shadow p-3 mb-5 mt-5">
        <div class="grid">
            <div class="row">
                <div class="col">
                    @foreach (json_decode($clients) as $client)
                        <div class="card mb-2" style="width: 18rem;" value='{{$client->id}}'>
                            <div class="card-body">
                            <h5 class="card-title">{{$client->name}} {{$client->lastname}}</h5>
                            <p class="card-text">{{$client->rut}}</p>
                            
                            </div>
                        </div>
                    @endforeach
                    @dd($assoc)    
                        
                    
                </div>
                <div class="col">
                    2
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center border border-3 rounded">
                        <h1>hola</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('cdn.bootstrapscrip')
</body>
</html>