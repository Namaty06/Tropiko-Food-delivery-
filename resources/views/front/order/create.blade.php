@extends('layouts.app')
@section('content')

<h2>Cart</h2>
<div class="container">
<form method="POST" action="{{ route('store.order',['id']) }}" > 
  @csrf
  <div class="row">
      <a href="{{ route('Order.create',$id) }}"></a>
  </div>
  <div class="row mb-3">
    <label for="city" class="col-md-4 col-form-label text-md-end @error('city') is-invalid @enderror">City </label>

    <div class="col-md-6">
        <select name="city" id="city" class="form-select form-select-sm">
            @foreach ($cities as $city)       
             <option value="{{ $city->id }}">{{ $city->city }}</option>
            @endforeach
        </select>

        @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
  <div class="mb-3 mt-2 col-md-6">
    <label for="exampleInputEmail1" class="form-label"> Address : </label>
    <div class="col-md-12">
    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" >
    @error('address')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
     @enderror
  </div>
  </div>

  <div class="mb-3 mt-2 col-md-6">
    <label for="exampleInputEmail1" class="form-label">Phone : </label>
    <div class="col-md-12">
    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" >
    @error('phone')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
     @enderror
  </div>
  </div>

  <div class="mb-3 col-md-6">
    <label for="exampleInputPassword1" class="form-label @error('description') is-invalid @enderror">Description : </label>
    <div class="col-md-12">
    <textarea class="form-control" name="description" id="" cols="30" rows="4"></textarea>
    @error('description')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
     @enderror
  </div>
  </div>

 <button class="btn btn-success">Validate Order</button> 


<h1>{{ $total }}</h1>

</form>
</div>
@endsection