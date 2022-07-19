@extends('layouts.app')
@section('content')

 <div class="container mt-4 " >
       <div class="row">
            <div class="col-md-12 card p-3">
                <h3 class="text-dark">My Order</h3>
                <div class="table-responsive mt-3">    
                    <table class="table " style="font-size: 17px">
                      <thead>      
                        <tr>
                          <th>Order id</th>
                          <th>Restaurant</th>
                          <th>Total</th>
                          <th>Order Date</th>
                          <th>Status</th>                       
                        </tr>
                      </thead>
                   <tbody>
                     <tr>                                                      
                        <td>{{$order->id}}</td>
                        <td> {{$order->restaurant->name}}</td>
                        <td> {{$order->total}}DH</td>
                        <td> {{$order->created_at->format('jS F Y ') }}</td>                
                        <td><span style="font-size: 13px" class="badge rounded-pill bg-primary text-light"> {{ $order->status->status }}</span> </td>

                     </tr>
                   </tbody>
                   
                    </table>
                <table class="table " style="font-size: 16px">
                    <thead>
                        <tr>
                            <th></th>
                             <th>Product</th>
                             <th>Name</th>
                             <th>Price</th>
                             <th>Quantity</th>
                             <th>Category</th>
                        </tr>
                    </thead>
                   @foreach ($order->product as $product)    
                    <tbody>                      
                        <tr>
                            <td></td>
                            <td style="width: 155px;"><img style="width: 140px" src="{{ asset('images/'.$product->image)}} " class="rounded mx-auto d-block " alt="..."></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}DH</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>{{ $product->category->category }}</td>
                        </tr>   
                     @endforeach

                    </tbody>

                </table>
            </div>     
        </div>   
    </div>         
 </div>    
 
@endsection