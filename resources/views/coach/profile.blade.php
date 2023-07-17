
@extends('coach.layouts.baselayouts')
@section('section','Perfil')
@section('title','Perfil')

@section('content')

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
      <div class="col-12 col-md-9 shadow p-3 mt-3 bg-white">
        <div class="row">
            <div class="col-2 ">
                <div class="col-md-2 mr-1">
                    <div class="rounded-circle  border justify-item-center" style="max-height:75px;max-width: 75px; min-width: 74px; min-height: 75px; background: url()"><img class="img-fluid d-flex mt-3 mx-auto my-auto aling-content-center justify-content-center" src="{{url('../image/account.png')}}" alt="" srcset="" style="max-height:45px;max-width: 45px; min-width: 45px; min-height: 45px;"></div>
                </div>
                
            </div>
            <div class="col-10  shadow p-3">
              
              @if ($profile->about_me==null)
                <h5>Sin informacion</h5>
              @else
                {{$profile->about_me}}
              @endif
              <div class="row justify-content-end">
                <div class="col-4 text-end">
                  <button class="btn" style="height: 40px; width: 40px"><img src="{{url('../image/icons/edit.png')}}" alt="" height="40px" width="40px"></button>
                </div>
               
              </div>
            
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection