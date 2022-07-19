@extends('layouts.dash')
@section('content')
    
<h1>Categories</h1>
<form method="POST" action="{{route('vendor.Category.store')}}">
@csrf

<div class="row mb-3">
    <label for="category" style="font-size: 18px" class="col-md-4 col-form-label text-md-end">Category :</label>

    <div class="col-md-6">
        <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus>
        @error('category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            Create
        </button>
    </div>
</div>
</form>

@endsection