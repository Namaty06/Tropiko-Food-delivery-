@extends('layouts.men')
@section('content')

  <div class="container-fluid mt-4">
    <div class="card">
     

      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">#Order id</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Restaurant</th>
              <th>Status</th>
              <th>Show</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
              <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->user->email }}</td>
                  <td>{{ $order->phone}}</td>
                  <td>{{ $order->restaurant->name }}</td> 
                  @if ($order->status->status == 'Refunded')
                  <td><span class="badge badge-danger">{{ $order->status->status }}</span></td>
        
                  @elseif ($order->status->status == 'Delivred')
                  <td><span class="badge badge-success">{{ $order->status->status }}</span></td>

                  @else
                       <td><span class="badge badge-info">{{ $order->status->status }}</span></td>
                  @endif
                   <td><a href="{{ route('delivery.details',$order->id) }}" class="btn btn-sm btn-outline-primary">Details</a></td>
              </tr> 
            @endforeach
            
          </tbody>
        </table>
      </div>
      <div class="card-footer"></div>
    </div>
  </div>
@endsection