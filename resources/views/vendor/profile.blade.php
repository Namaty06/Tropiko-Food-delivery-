@extends('layouts.dash')
@section('content')
<section style="background-color: #eee;" >
    <div class="container py-5">
    
  
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $vendor->name }}</h5>
              <p class="text-muted mb-1">{{ $vendor->email }}</p>
              <div class="d-flex justify-content-center mb-2 mt-2">
                <a type="button" class="btn btn-outline-primary ms-1" href="{{ route('vendor.edit') }}">Edit</a>
              </div>
            </div>
          </div>
         
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $vendor->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $vendor->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">+212{{ $vendor->phone }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Restaurant</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $vendor->restaurant->name }}</p>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </section>
@endsection