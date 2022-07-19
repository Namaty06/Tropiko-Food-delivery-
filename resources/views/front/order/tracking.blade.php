@extends('layouts.app')
@section('content')

 <div class="container mt-4 mb-3 " >
       <div class="row mb-3">
            <div class="col-md-12 card p-3">
                <h3 class="text-dark">My Orders</h3>
                <div class="table-responsive mt-3"> 
                     
                    <table class="table " style="font-size: 18px">
                      <thead>      
                        <tr>
                          <th>Order id</th>
                          <th>Restaurant</th>
                          <th>Total</th>
                          <th>Order Date</th>
                          <th>Status</th>
                          <th> Show </th>
                        </tr>
                      </thead>
                     @foreach ($orders as $order)  
                   <tbody>
                     <tr>                                                      
                        <td>{{$order->id}}</td>
                        <td> {{$order->restaurant->name}}</td>
                        <td> {{$order->total}}</td>
                        <td> {{$order->created_at->format('jS F Y ') }}</td>
                        <td>
                          
                          @if ($order->status->status === "Refunded")
                            <span class="badge bg-danger">{{ $order->status->status }}</span>
                            @elseif ($order->status->status === "Inavailable")
                            <span class="badge bg-warning">{{ $order->status->status }}</span>
                            @elseif ($order->status->status === "Delivred")
                            <span class="badge bg-success">{{ $order->status->status }}</span>
                            @else
                            <span class="badge bg-primary">{{ $order->status->status }}</span>
                          @endif

                        </td> 
                        <td> 
                            <a class="btn btn-sm btn-info" href="{{ route('History.show',$order->id) }}">
                            <i class="fas fa-eye"></i>
                            </a>
                        </td>
                     </tr>
                   </tbody>
                    @endforeach

                    </table>
                  </div>     
        </div>   
    </div>         
 </div>    
 
@endsection