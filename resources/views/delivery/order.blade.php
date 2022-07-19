@extends('layouts.men')
@section('content')

  <div class="container-fluid mt-4">
    <div class="card">
     

      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">#Order</th>
              <th>User</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Restaurant</th>
              <th>Restaurant Address</th>
              <th>Status</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            <form action="{{ route('delivery.updateorder',$order->id) }}" method="post">
              <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->user->name }}</td>
                  <td>{{ $order->phone}}</td>
                  <td>{{ $order->address }}</td> 
                  <td>{{ $order->restaurant->name }}</td> 
                  <td>{{ $order->restaurant->address }}</td> 
                  @if ($order->status->status == 'Delivred' || $order->status->status == 'Refunded'  || $order->status->status == 'Preparing' )
                    <td><span style="font-size: 18 px" class="badge rounded-pill bg-primary text-light"> {{ $order->status->status }}</span> </td>
                  @else
                 
                  <td style="width: 120px">
                      <select class="form-control text-dark" name="status" id="status">
                      <option style="font-size: 14px" value="{{$order->status->id}}" selected>{{ $order->status->status }}</option>
                      @foreach ($statuses as $status)
                      <option style="font-size: 14px" value="{{$status->id}}">{{ $status->status }}</option>
                      @endforeach
                      
                    </select>
                  </td>
                  <td>        
                     @method('PUT')
                     @csrf
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>                  
                  </td>
                  @endif
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