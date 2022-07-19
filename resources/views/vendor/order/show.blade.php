@extends('layouts.dash')
@section('content')

<table class="table" style="color: black">
    <thead>
      <tr>
        <th scope="col">#Order id</th>
        <th>Email</th>
        <th>Phone</th>
        <th>City</th>
        <th>Comment</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody> 
      <form action="{{ route('vendor.Order.update',$order->id) }}" method="post">
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->email }}</td>
                <td>{{ $order->phone}}</td>
                <td>{{ $order->city->city }}</td>
                <td>{{ $order->description }}</td>
                @if ($order->status->status == 'Confirmed' || $order->status->status == 'Preparing'  )
                    
               
                <td style="width: 140px">
                    <select class="custom-select custom-select-sm text-dark" name="status" id="status">
                    <option value="{{$order->status->id}}" selected>{{ $order->status->status }}</option>
                    @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->status }}</option>
                    @endforeach
                    
                  </select>
                </td>
                <td>
                    
                        @method('PUT')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                  
                </td> 
                @else
                <td><span style="font-size: 15 px" class="badge rounded-pill bg-primary text-light"> {{ $order->status->status }}</span> </td>
                
              @endif

            </tr> 
          </form>
    </tbody>
    <thead>
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
  

@endsection