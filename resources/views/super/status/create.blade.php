@extends('layouts.dashboard')

@section('content')
    
<form method="POST" action="{{route('admin.Status.store')}}">
@csrf

<div class="row mb-3">
    <label for="status" style="font-size: 18px" class="col-md-4 col-form-label text-md-end">Status :</label>

    <div class="col-md-6 mb-3">
        <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" required autocomplete="status" autofocus>
        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <br>
        <label for="role"  style="font-size: 18px" class="col-md-4 col-form-label text-md-end">User :</label>

        <div class="col-md-6">
            <select name="role" id="role" class="custom-select custom-select-sm text-dark">
                <option value="Vendor">Vendor</option>
                <option value="Admin">Admin</option>
                <option value="SuperAdmin">SuperAdmin</option>
                <option value="DeliveryMen">DeliveryMen</option>
                <option value="User">User</option>


            </select>

            @error('role')
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