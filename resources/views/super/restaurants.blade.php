@extends('layouts.dashboard')
@section('content')



<table class="table" style="color: black" >
    <thead>
      <tr>
        <th scope="col">#Logo</th>
        <th>Name</th>
        <th>Owner</th>
        <th>Phone</th>
        <th>Email</th>
        <th>City</th>
        <th>Address</th>
        

      </tr>
    </thead>
    <tbody id="news_data"> 
        @foreach ($restaurants as $restaurant)
            <tr style="font-weight: 600" >
                <td style="width: 135px;"><img style="width: 110px" src="{{ asset('logo/'.$restaurant->logo)}} " class="rounded mx-auto d-block " alt="..."></td>
                <td>{{ $restaurant->name }}</td>
                <td  > <span style="font-size: 14px" class="badge rounded-pill bg-success text-light">  {{ $restaurant->vendor->name }}</span></td>
                <td>+212{{ $restaurant->orderPhone}}</td>
                <td>{{ $restaurant->orderEmail }}</td>
                <td>{{ $restaurant->city->city }}</td>
                <td>{{ $restaurant->address }}</td>
                

            </tr>        
            
        @endforeach

    </tbody>
  </table>
 
@endsection