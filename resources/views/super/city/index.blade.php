@extends('layouts.dashboard')
@section('content')

<table class="table " style="color: black">
    <thead>
      <tr>
        <th scope="col">#id</th>
        <th scope="col">City</th>
        <th></th>
        <th></th>
        <th>Edit</th>
        <th>Delete</th>

      </tr>
    </thead>
    <tbody> 
    @forelse ($cities as $city)            
      <tr>
        <th scope="row">{{ $city->id }}</th>
        <td>{{$city->city}}</td>
        <td></td>
        <td></td>
        
        <td><a class="btn btn-sm btn-info" href="{{ route('admin.City.edit',[$city->id]) }}"><i  class="fas fa-edit"></i></a></td>
        <td>
            <form action="{{ route('admin.City.destroy',$city->id) }}" method="post">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i></button>
            </form>
        </td>

      </tr> 
      @empty   
      <p>Empty Status</p>    
      @endforelse 

    </tbody>
  </table>

@endsection
