@extends('layouts.dash')
@section('content')
<div class="mb-2 "  id="sample-table-3">
  <form class="" style="width: 250px" method="GET" >
    <label>Filter By Status</label>
    <select class="custom-select custom-select-sm text-dark"  name="status_id" id="status_id">
      <option value="0">Show All</option>
        @foreach($statuses as $status)
            <option value="{{ $status->id }}">{{ $status->status }}</option>
                @endforeach
        </select>
</form> 
</div>
<table class="table" style="color: black">
    <thead>
      <tr>
        <th scope="col">#Order id</th>
        <th>Email</th>
        <th>Phone</th>
        <th>City</th>
        <th>Status</th>
        <th>Show</th>
      </tr>
    </thead>
    <tbody id="news_data"> 
        @forelse ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->email }}</td>
                <td>{{ $order->phone}}</td>
                <td>{{ $order->city->city }}</td>
                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                <td><span style="font-size: 13px" class="badge rounded-pill bg-primary text-light"> {{ $order->status->status }}</span> </td>
                <td><a class="btn btn-info" href="{{ route('vendor.Order.show',[$order->id]) }}"><i class="fas fa-eye"></i></a></td>
            </tr>
        
        @empty
            
        @endforelse
       
    </tbody>
  </table>

@endsection