@extends('layouts.dash')
@section('content')

<table class="table" style="color: black">
    <thead>
      <tr>
        <th scope="col">#Id</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Category</th>
        <th scope="col">Edit</th>

      </tr>
    </thead>
    <tbody>
     @foreach ($products as $product)

         <tr>                
         
        <td>{{ $product->id }}</td>
        <td style="width: 135px;"><img style="width: 110px" src="{{ asset('images/'.$product->image)}} " class="rounded mx-auto d-block " alt="..."></td>
        <td>{{ $product->name }}</td>
        <td>{{ Str::limit($product->description,20) }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->category->category }}</td>
        <td><a class="btn btn-sm btn-primary" href="{{ route('vendor.Product.edit',[$product->id]) }}"> <i class="fas fa-edit"></i></a></td>

      </tr>
    
      @endforeach
    </tbody>
  </table>

@endsection