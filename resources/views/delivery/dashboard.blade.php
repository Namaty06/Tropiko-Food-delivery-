@extends('layouts.men')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row mb-3">
      <!-- Earnings (Monthly) Card Example -->

      <div class="col-xl-4 col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row  no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings (Monthly)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">${{ $earn }}.00</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                  <span>Since last month</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Annual) Card Example -->
      <div class="col-xl-4 col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Delivred Orders</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $d }}</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                  <span>Since last years</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- New User Card Example -->
      <div class="col-xl-4 col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Refunded Orders</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $r }}</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 20.4%</span>
                  <span>Since last month</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-danger"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
    
</div>
      
@endsection