
@extends('coach.layouts.baselayouts')
@section('section','Perfil')
@section('title','Perfil')
@section('additionalCSS')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
  
  <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-12 col-lg-2 justify-content-center">
          <nav class="nav flex-column">
            <a class="nav-link active" aria-current="page" href="#">Informacion general</a>
            <a class="nav-link" href="#">Categorias</a>
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
              <div class="col-8 col-md-8  shadow p-3">
                
                @if ($profile->about_me==null)
                  <div>
                    <h5>Sin informacion</h5>
                  </div>
                  
                @else
                  <div>
                    Sobre mi: 
                    {{$profile->about_me}}
                  </div>
                  <div>
                    Años de experiencia: {{$profile->years}}
                    (desde {{$profile->yearexperience}})
                  </div>
                  <div>
                    
                    {{$profile->about_me}}
                  </div>
                  
                @endif
                <div class="row justify-content-end">
                  <div class="col-2 text-end">
                    <button class="btn" style="height: 40px; width: 40px"><img src="{{url('../image/icons/edit.png')}}" alt="" height="40px" width="40px"></button>
                  </div>
                
                </div>
              
              </div>
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col-12 col-lg-2"></div>
        <div class="col-12 col-md-9  p-3 mt-3 align-self-center ">
          
          <div id="categoricontainer" class="container-sm shadow p-3 mx-auto my-auto bg-white" style="max-width: 600px; min-width: 418px;">
            <h4>categorias</h4>
            <div id="pills">
              @foreach ($categoriesCoach as $categoryCoach )
                <span class="badge rounded-pill text-white text-bg-info mt-2" value='{{$categoryCoach->idAssoc}}'>
                  {{$categoryCoach->categoryName}}
                 
                </span>
              @endforeach
          </div>
            
            <div class="row justify-content-end">
              <div class="col-2 text-end">
                <button class="btn" style="height: 40px; width: 40px"><img src="{{url('../image/icons/edit.png')}}" alt="" height="40px" width="40px" data-bs-toggle="modal" data-bs-target="#categoriesModal" data-bs-whatever="@mdo"></button>
              </div>
            
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#baseInformationModal" data-bs-whatever="@mdo">info update</button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoriesModal" data-bs-whatever="@fat">Categorias update</button>
    <button type="button" class="btn btn-primary" id="btn-get-categories">Categorias update</button>
    <!-- base info modal update -->
    <div class="modal fade" id="baseInformationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  
    <!-- categories modal update -->
    <div class="modal fade" id="categoriesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="categoriesUpdateLabel">Actualizar categorias</h1>
            <button type="button" class="btn-close modal-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="categories" class="form-label">Categorias</label>
                <select name="categories" id="categories">
                    <option value="0" selected>Seleciones una categoria</option>
                    @foreach ($categories as $category )
                      <option value="{{$category->idcategory}}">{{$category->category}}</option>
                    @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="categoriesContainer">Categorias asociadas</label>
                <div id="categoriesContainer">
                    @foreach ($categoriesCoach as $categoryCoach )
                      <span class="badge rounded-pill text-bg-primary mt-2" value='{{$categoryCoach->idAssoc}}'>
                        {{$categoryCoach->categoryName}}
                        <span>
                          <button type="button" class="btn-close"  aria-label="Close"></button>
                        </span>
                      </span>
                    @endforeach
                </div>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
    
@endsection

@section('additionalScript')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  @vite(['resources/js/profilecoach.js'])
@endsection