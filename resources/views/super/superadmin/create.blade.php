@extends('layouts.dashboard')
@section('content')

<table class="table " style="color: black">
    <thead>
      <tr>
        <th scope="col"># Cin</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">City</th>
        <th scope="col">phone</th>
        <th scope="col">created_at</th>
        <th scope="col">New</th>

        
      </tr>
    </thead>
    <tbody> 

        @forelse ($admins as $admin)            
      <tr>
        <th scope="row" class="badge bg-success  mt-2">{{ $admin->cin }}</th>
        <td>{{$admin->name}}</td>
        <td>{{$admin->email}}</td>
        <td>{{$admin->city->city}}</td>
        <td>+212{{$admin->phone}}</td>
        <td>{{$admin->created_at->format('d/m/Y')}}</td>
        <td>
            <form method="post" action="{{ route('admin.super.create',$admin->id)}}">
                @csrf
            <button class="btn btn-outline-primary"> To Super </button>
            </form>
        </td>


      </tr> 
      @empty   
      <p>Empty vendors</p>    
      @endforelse 

    </tbody>
  </table>

@endsection

