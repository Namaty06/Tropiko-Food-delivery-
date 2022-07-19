@extends('layouts.index')
@section('content')
    
<div style="background-color:#cfe8c8 !important">

    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form action="{{ route('vendor.check') }}" method="post">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" class="form-control form-control-lg" name="email" placeholder="Email : " value="{{ old('email') }}">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>               
                   <label  class="form-label" for="form1Example13">Email </label>
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-4">
                      <div class="input-group">
                     
                      <input type="password" id="password" class="form-control form-control-lg" name="password" placeholder="Password : " value="{{ old('password') }}">
                      <span class="input-group-text">
                        <i class="far fa-eye" id="togglePassword" 
                       style="cursor: pointer"></i>
                       </span>
                      
                  </div>
                  <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                    <label class="form-label" for="form1Example23">Password</label>
                </div>
      
                <div class="d-flex justify-content-around align-items-center mb-4">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value=""
                      id="form1Example3"
                      checked
                    />
                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                  </div>
                </div>
      
                <!-- Submit button -->
                <button type="submit" class="btn btn-outline-success btn-lg btn-block">Sign in</button>
                
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection
