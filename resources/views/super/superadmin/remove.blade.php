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
        <th scope="col">Remove</th>

        
      </tr>
    </thead>
    <tbody> 

      @foreach ($admins as $admin)      
      <tr>
        <th scope="row" class="badge bg-success  mt-2">{{ $admin->cin }}</th>
        <td>{{$admin->name}}</td>
        <td>{{$admin->email}}</td>
        <td>{{$admin->city->city}}</td>
        <td>{{$admin->phone}}</td>
        <td>{{$admin->created_at->format('d/m/Y')}}</td>
        <td>
            <form method="POST"  action="{{ route('admin.super.remove',['id'=>$admin->id]) }}">
                @csrf              

                 <button class="btn btn-outline-danger"> Remove </button>

            </form>
        </td>


      </tr> 
      @endforeach         

    </tbody>
  </table>

@endsection

