@extends('layouts.dash')
@section('content')

<table class="table" style="color: black">
    <thead>
      <tr>
        <th scope="col">#id</th>
        <th scope="col">Category</th>
        <th scope="col">created_at</th>
        <th>Edit</th>
        <th>Delete</th>

      </tr>
    </thead>
    <tbody> 

        @forelse ($categories as $category)            
      <tr>
        <th scope="row">{{ $category->id }}</th>
        <td>{{$category->category}}</td>
        <td>{{$category->created_at}}</td>
        <td><a class="btn btn-sm btn-info" href="{{ route('vendor.Category.edit',[$category->id]) }}"><i  class="fas fa-edit"></i></a></td>
        <td>
          <form action="{{ route('vendor.Category.destroy',[$category->id]) }}" method="post">
            @csrf
            @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger"><i  class="fas fa-trash"></i></button>
          </form>
        </td>


      </tr> 
      @empty   
      <p>Empty categories</p>    
      @endforelse 

    </tbody>
  </table>

@endsection