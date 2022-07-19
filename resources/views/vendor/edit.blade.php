@extends('layouts.dash')
@section('content')

<section style="background-color: #eee;" >
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-10">
          <div class="card mb-4">
            <form  action="{{ route('vendor.update') }}" method="POST">
                @method('PUT')
                @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror " value="{{ $vendor->name }}">
                    
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
              </div>
              <hr>
              
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">CIN</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="cin" name="cin" class="form-control @error('cin') is-invalid @enderror" value="{{ $vendor->cin }}">
                    @error('cin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $vendor->email }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="phone" name="phone" class="form-control  @error('phone') is-invalid @enderror" value="{{ $vendor->phone }}">
                   
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
              </div>
            
              
              <div class="row mt-4">
                <div class="col-sm-9">
                   <button type="submit" class="btn btn-info"> Update </button>
                </div>
              </div>
             </div>
           </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection