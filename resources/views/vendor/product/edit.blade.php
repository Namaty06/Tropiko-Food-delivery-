@extends('layouts.dash')
@section('content')
    
<form method="POST" action="{{route('vendor.Product.update',['Product'=>$product->id])}}" enctype="multipart/form-data">
    @method('PUT')
@csrf

  <div class="mb-3 mt-2 col-md-6">
    <label for="exampleInputEmail1" class="form-label">Title : </label>
    <div class="col-md-12">
    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}" name="name" >
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
     @enderror
  </div>
  </div>

  <div class="mb-3 col-md-6">
    <label for="exampleInputPassword1" class="form-label @error('description') is-invalid @enderror" >Description : </label>
    <div class="col-md-12">
    <textarea class="form-control" name="description" id="" cols="30" rows="4">{{ $product->description }}</textarea>
    @error('description')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
     @enderror
  </div>
  </div>

  <div class="mb-3 col-md-6">
    <label for="exampleInputtext1" class="form-label">Price :</label>
    <div class="col-md-12">
    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}" >
       @error('price')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
       @enderror
    </div>
  </div>
  
  <div class="mb-3 col-md-6">
    <label for="category" class="form-label">Category :</label>
     <div class="col-md-12">
     <select name="category" id="category" class="custom-select custom-select-sm text-dark @error('category') is-invalid @enderror">
       
        <option selected value="{{$product->category->id}}">{{$product->category->category}}</option>

        @foreach ($categories as $category)
         <option  value="{{$category->id}}">{{$category->category}}</option>
        @endforeach
     </select>
        @error('category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
     
   </div>

   <div class=" ml-3 mb-3">
    <label for="image" class=" col-form-label text-md-end">Image :</label>

    <div class="col-md-4">       
          <img style=" width:110px " class="rounded mx-auto d-inline mb-2 " src="{{ asset('images/'.$product->image)}} " >
        <input id="image" type="file" placeholder="Image" class="form-control  @error('image') is-invalid @enderror" name="image"  >
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
</div>
<div class="row mb-4">
    <div class="col-md-6 ">
        <button type="submit" class="btn btn-success">
            Update
        </button>
    </div>
</div>
</form>

@endsection