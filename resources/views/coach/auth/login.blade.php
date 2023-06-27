<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        @include('../../cdn/bootstrapcss')
        @Vite(['resources/css/backgroundlogin.css'])
        <title>Document</title>
    </head>
    <body>
        <div class="container">
            @if (session()->has('error'))
                <h3 class="alert alert-danger">{{session()->get('error')}}</h3>
            @endif
        </div>
        <div class="container d-flex align-items-center justify-content-center " style="min-height: 100vh;">
            <div class="col-md-4 shadow p-3 mb-5 bg-body rounded" >
                  <form method="GET" action="{{route('authenticatecoach')}}">
                      @csrf
                      <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control mt-2" id="email" name="email"  aria-describedby="emailHelp" placeholder="Enter email" required>
                      <small id="emailHelp" class="form-text text-muted">@error('email')
                          
                      @enderror</small>
                      </div>
                      <div class="form-group mt-2">
                      <label for="password">Password</label>
                      <input type="password" class="form-control mt-2" id="password" name="password" placeholder="Password" required>
                      </div>
                      
                      <button type="submit" class="btn btn-primary mt-2">Submit</button>
                  
                  </form>
              </div>
          </div>

    </body>
</html>






      