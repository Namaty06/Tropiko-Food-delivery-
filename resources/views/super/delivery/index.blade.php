@extends('layouts.dashboard')
@section('content')

<table class="table " style="color: black">
    <thead>
      <tr>
        <th scope="col"># Cin</th>
        <th scope="col">Carte Grise</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">City</th>
        <th scope="col">phone</th>
        <th scope="col">Created_at</th>
        <th scope="col">Delete</th>


        
      </tr>
    </thead>
    <tbody> 

        @forelse ($mens as $men)            
      <tr>
        <th scope="row" class="badge bg-info  mt-2">{{ $men->cin }}</th>
        <td>{{$men->carte_grise}}</td>
        <td>{{$men->name}}</td>
        <td>{{$men->email}}</td>
        <td>{{$men->city->city}}</td>     
         <td>+212{{$men->phone}}</td>
        <td>{{$men->created_at->format('d/m/Y')}}</td>
        <td>
            <form action="{{ route('admin.Delivery.destroy',['Delivery'=>$men->id]) }}">
              @csrf
            <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
            </form>
        </td>


      </tr> 
      @empty   
      <p>Empty vendors</p>    
      @endforelse 

    </tbody>
  </table>

@endsection

