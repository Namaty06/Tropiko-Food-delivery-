
@extends('layouts.dashboard')
@section('content')
    

    


<table class="table " style="color: black">
    <thead>
      <tr>
        <th scope="col"># Cin</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">created_at</th>
        
        
      </tr>
    </thead>
    <tbody> 

        @foreach ($vendors as $vendor)            
      <tr>
        <th scope="row" class="badge bg-info  mt-2">{{ $vendor->cin }}</th>
        <td>{{$vendor->name}}</td>
        <td>{{$vendor->email}}</td>
        <td>{{$vendor->phone}}</td>
        <td>{{$vendor->created_at->format('d/m/Y')}}</td>
                 
        
      </tr> 
      
      @endforeach 

    </tbody>
  </table>

@endsection

