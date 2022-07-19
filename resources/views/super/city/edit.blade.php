@extends('layouts.dashboard')
@section('content')
    
<form method="POST" action="{{route('admin.City.update',$city->id)}}">
@csrf
@method('put')
<div class="row mb-3">
    <label for="city" style="font-size: 18px" class="col-md-4 col-form-label text-md-end">City :</label>

    <div class="col-md-6 mb-3">
        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $city->city }}" required autocomplete="city" autofocus>
        @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
</div>
<div class="row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            Update
        </button>
    </div>
</div>
</form>

@endsection
