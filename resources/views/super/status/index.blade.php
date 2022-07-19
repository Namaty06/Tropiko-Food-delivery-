@extends('layouts.dashboard')
@section('content')

<table class="table " style="color: black">
    <thead>
      <tr>
        <th scope="col">#id</th>
        <th scope="col">Status</th>
        <th scope="col">Type</th>
        <th scope="col">created_at</th>
        <th>Edit</th>

      </tr>
    </thead>
    <tbody> 
      @forelse ($statuses as $status)            
      <tr>
        <th scope="row">{{ $status->id }}</th>
        <td>{{$status->status}}</td>
        <td>{{$status->role}}</td>
        <td>{{$status->created_at}}</td>
        <td><a class="btn btn-sm btn-info" href="{{ route('admin.Status.edit',[$status->id]) }}"><i  class="fas fa-edit"></i></a></td>

        
      </tr> 
      @empty   
      <p>Empty Status</p>    
      @endforelse 

    </tbody>
  </table>

@endsection
