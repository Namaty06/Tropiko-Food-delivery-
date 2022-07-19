@extends('layouts.dashboard')

@section('content')
    
<form method="POST" action="{{route('admin.Status.update',['Status'=>$status->id])}}">
    @method('put')
@csrf

<div class="row mb-3">
    <label for="status" style="font-size: 18px" class="col-md-4 col-form-label text-md-end">Status :</label>

    <div class="col-md-6">
        <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ $status->status }}" required autocomplete="status" autofocus>
        @error('status')
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