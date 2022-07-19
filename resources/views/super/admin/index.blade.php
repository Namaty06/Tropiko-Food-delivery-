@extends('layouts.dashboard')
@section('content')

<table class="table " style="color: black">
    <thead>
      <tr>
        <th scope="col"># Cin</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">City</th>
        <th scope="col">Phone</th>
        <th scope="col">Role</th>         
        <th scope="col">Created_at</th>
        <th scope="col">Delete</th>

        
      </tr>
    </thead>
    <tbody> 

        @forelse ($admins as $admin)            
      <tr>
        <th scope="row" class="badge bg-success  mt-2">{{ $admin->cin }}</th>
        <td>{{$admin->name}}</td>
        <td>{{$admin->email}}</td>
        <td>{{$admin->phone}}</td>
        <td>{{$admin->city->city}}</td>
        @if ($admin->is_super)
            <td style="color: white" class="badge bg-dark p-1 mt-3">Super Admin</td>
            @else
            <td style="color: white" class="badge bg-dark p-1  mt-3"> Admin</td>
        @endif
        
        <td>{{$admin->created_at->format('d/m/Y')}}</td>
       
        @if ($admin->id != Auth::guard('admin')->user()->id)
            
        
        <td>
            <form action="{{ route('admin.Admin.destroy',[$admin->id]) }}">
              @csrf
              @method('DELETE')
             <button type="submit" class="btn btn-outline-danger"> <i class="fa fa-trash"></i></button>
            </form>
        </td>
       @endif

      </tr> 
      @empty   
      <p>Empty vendors</p>    
      @endforelse 

    </tbody>
  </table>

@endsection

