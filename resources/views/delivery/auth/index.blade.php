@extends('layouts.men')
@section('content')

    
      <div class="container-fluid mt-4">
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-dark">Ready Orders</h5>
          </div>

          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Order</th>
                  <th scope="col">Restaurant</th>
                  <th scope="col">Restaurant Address</th>
                  <th scope="col">Client</th>
                  <th scope="col">Client Adress</th>
                  <th scope="col">Choose</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach ($orders as $order)
                          
                  <td> {{ $order->id }} </td>           
                  <td> {{ $order->restaurant->name }} </td>
                  <td> {{ $order->restaurant->address }} </td>
                  <td> {{ $order->user->name }} </td>
                  <td> {{ $order->address }} </td>
                  <td>                  
                    <form action="{{ route('delivery.choose',$order->id) }}" method="post">
                      @method('put')
                      @csrf
                      <input type="submit" class="btn btn-sm btn-info" value="Pick">
  
                   </form>
                  </td>
                  @endforeach 
                </tr>
                
              </tbody>
            </table>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
  
@endsection
