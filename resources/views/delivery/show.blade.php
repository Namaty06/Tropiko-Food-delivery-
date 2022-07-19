@extends('layouts.men')
@section('content')

  <div class="container-fluid mt-4">
    <div class="card">
     

      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">#Order id</th>
              <th>User</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Restaurant</th>
              <th>Restaurant Address</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->user->name }}</td>
                  <td>{{ $order->phone}}</td>
                  <td>{{ $order->address }}</td> 
                  <td>{{ $order->restaurant->name }}</td> 
                  <td>{{ $order->restaurant->address }}</td> 
                  <td ><span  class="badge rounded-pill bg-info text-light"> {{ $order->status->status }}</span> </td>

                  
              </tr> 
            </form>
          </tbody>
          <thead class="thead-light">
            <tr>
              <th scope="col">Image</th>
              <th>Title</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr> 
        </thead>
    
        <tbody>       
            
            @foreach ($order->product as $product)       
             <tr>
                <td style="width: 135px;"><img style="width: 110px" src="{{ asset('images/'.$product->image)}} " class="rounded mx-auto d-block " alt="..."></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ $product->price }}</td>
             </tr>       
            @endforeach
    
        </tbody>
        </table>
      </div>
      <div class="card-footer"></div>
    </div>
  </div>
@endsection