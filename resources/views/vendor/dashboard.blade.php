@extends('layouts.dash')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row mb-3">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings (Monthly)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">${{ $sum }},00</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
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
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Sales</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count }}</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-shopping-cart fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- New User Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Clients</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $clients }}</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Products</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $p }}</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 1.10%</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-warning"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  <div class="d-flex align-items-center mb-4">
                      <h4 class="card-title">New Products</h4>
                      <div class="ml-auto">
                          <div class="dropdown sub-dropdown">
                              <button class="btn btn-link text-muted dropdown-toggle" type="button"
                                  id="dd1" data-toggle="dropdown" aria-haspopup="true"
                                  aria-expanded="false">
                                  <i data-feather="more-vertical"></i>
                              </button>
                              
                          </div>
                      </div>
                  </div>
                  <div class="table-responsive">
                      <table class="table no-wrap v-middle mb-0">
                          <thead>
                              <tr class="border-0">
                                  <th class="border-0 font-14 font-weight-medium text-muted">
                                    Product
                                  </th>
                                  <th class="border-0 font-14 font-weight-medium text-muted px-2">
                                     Category
                                  </th>
                                  <th class="border-0 font-14 font-weight-medium text-muted">
                                     Price
                                  </th>
                                  <th class="border-0 font-14 font-weight-medium text-muted ">
                                     Created_at
                                  </th>
                                  <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                    Status
                                 </th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($products as $product)                        
                              <tr>
                                  <td class="border-top-0 px-2 py-4">
                                      <div class="d-flex no-block align-items-center">
                                          <div class="mr-3"><img
                                                  src="{{ asset('images/'.$product->image)}} "
                                                  alt="user" class="rounded-circle" width="45"
                                                  height="45" /></div>
                                          <div class="">
                                              <h5 class="text-dark mb-0 font-16 font-weight-medium"> {{ $product->name }} </h5>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->category->category }}</td>
                                  <td class="font-weight-medium text-dark border-top-0 px-2 py-4">$
                                    {{ $product->price }}
                                  </td>                            
                                  <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->created_at->format('d/m/Y') }}</td>
                                  <td class="border-top-0 text-center px-2 py-4"><i
                                          class="fa fa-circle text-primary font-12" data-toggle="tooltip"
                                          data-placement="top" title="In Testing"></i></td>
                                  
                                  
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
      
@endsection