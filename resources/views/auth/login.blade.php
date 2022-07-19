@extends('layouts.app')

@section('content')



<div class="content pt-4">
    <div class="container" >
      <div class="row">
        <div class="col-md-6">
          <img style="width:400px " src="{{ asset('images/moto.png') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4 mt-3">
              <h3>Login</h3>

            </div>
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="form-group mb-3">
                  <label for="email" class=" col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                  <div class="col-md-12">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group  mb-3">
                  <label for="password" class=" text-md-end">{{ __('Password') }}</label>

                  <div class="col-md-12 mb-3">
                      <div class="input-group">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      <span class="input-group-text">
                          <i class="far fa-eye" id="togglePassword" 
                         style="cursor: pointer"></i>
                         </span>
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                   </div>
                  </div>
              </div>

              <div class="row mb-3">
                  <div class="col-md-12 ">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                          <label class="form-check-label" for="remember">
                              {{ __('Remember Me') }}
                          </label>
                      </div>
                  </div>
              </div>

              <div class="row mb-5">
                  <div class="col-md-8 ">
                      <button type="submit" class="btn btn-info">
                          {{ __('Login') }}
                      </button>

                      
                  </div>
              </div>
          </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
   
  </body>
</html>

@endsection
