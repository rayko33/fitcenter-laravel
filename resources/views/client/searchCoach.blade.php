@extends('client.layouts.baselayout')
@section('section','Buscar entrenador')
@section('title','Buscar entrenador')

@section('content')
<div class="container mt-5">
    <div class="grid">
        <form action="">
            
            <select name="region" id="region">
                <option value="0" selected>Region</option>
                @foreach ($regions as $region)
                    <option value="{{$region->idregion}}">{{$region->region}}</option>
                @endforeach
            </select>
            <select name="cities" id="cities" class="" disabled>
                <option value="0" selected>Selecione una region</option>
            </select>
            <select name="categories" id="categories">
                <option value="0" selected>seleccione una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{$category->idcategory}}">{{$category->category}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-info text-white">Filtrar</button>
        </form>
    </div>
</div>
<div class="container border mt-5 ">
    
    <div class="grid">
        <div class="row">
            @foreach ($coaches as $coach )
                <div class="shadow-sm rounded d-flex card mx-3 mt-3 mb-2" style="max-width: 400px;">
                    <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{url('../image/account.png')}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">{{$coach->namecoach }} {{$coach->lastnamecoach}}</h5>
                        <b><label for="about">Sobre mi</label></b>
                        <p class="card-text" id="about">{{$coach->about_me}}</p>
                        <b><label for="yearsexperience">años de experiencia</label></b>
                        <p class="card-text" id="yearsexperience">{{$coach->years}}</p>
                        <p class="card-text">{{$coach->yearexperience}}</p>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
@section('additionalScript')
    @vite(['resources/js/coachesSearchFilter.js'])
@endsection