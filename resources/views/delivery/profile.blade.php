@extends('layouts.men')
@section('content')
<section style="background-color: #eee;" >
    <div class="container py-5">
    
  
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $delivery->name }}</h5>
              <p class="text-muted mb-1">{{ $delivery->email }}</p>
              
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
                  <p class="text-muted mb-0">{{ $delivery->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">                
                    <p class="text-muted mb-0">{{ $delivery->city->city }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">+212{{ $delivery->phone }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Restaurant</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $delivery->cin }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Carte Grise</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $delivery->carte_grise }}</p>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </section>
@endsection