@extends('layouts.dash')
@section('content')
    
<form method="POST" action="{{route('vendor.Product.store')}}" enctype="multipart/form-data">
    @csrf
  <div class="mb-3 mt-2 col-md-6">
    <label for="exampleInputEmail1" class="form-label">Title : </label>
    <div class="col-md-12">
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" >
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
     @enderror
  </div>
  </div>

  <div class="mb-3 col-md-6">
    <label for="exampleInputPassword1" class="form-label  ">Description : </label>
    <div class="col-md-12">
    <textarea class="form-control @error('description') is-invalid @enderror" name="description"  cols="30" rows="4"></textarea>
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
    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" >
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
         @forelse ($categories as $category)
         <option selected value="{{$category->id}}">{{$category->category}}</option>
         @empty
         <option selected value="empty categories"></option>
         @endforelse
     </select>
        @error('category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
     
   </div>

   <div class="col-md-6 mb-3">
    <label for="image" class=" col-form-label text-md-end">Image :</label>

    <div class="">
        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"  >

        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
   </div>
<div class="row mb-0">
    <div class="col-md-6 ">
        <button type="submit" class="btn btn-success">
            Create
        </button>
    </div>
</div>
</form>

@endsection