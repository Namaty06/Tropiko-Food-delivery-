@extends('layouts.app')

@section('content')

<div class="content pt-4 ">
    <div class="container" >
      <div class="row">
        <div class="col-md-6">
            <img style="width:400px" src="{{ asset('images/moto.png') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row card mb-1 justify-content-center">
            <div class="col-md-12 ">
              <div class="mb-4 mt-4">
              <h3>Register</h3>
            </div>
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="form-group mb-3">
                  <label for="name" class=" col-form-label text-md-end">{{ __('Name') }}</label>

                  <div class="col-md-12">
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

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

              <div class="form-group mb-3">
                  <label for="password-confirm" class=" text-md-end">{{ __('Confirm Password') }}</label>

                  <div class="col-md-12">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
              </div>

            
              <div class="row mb-3 ml-1">
                  <div class="col-md-12 ">
                      <button type="submit" class="btn btn-info">
                          {{ __('Register') }}
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

  
   

@endsection
