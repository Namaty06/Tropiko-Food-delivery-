@extends('layouts.dash')
@section('content')
    
<form method="POST" action="{{ route('vendor.Restaurant.update',$restaurant->id) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">Restaurant Name</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $restaurant->name }}" required autocomplete="name" >

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="orderemail" class="col-md-4 col-form-label text-md-end">Order Email</label>

        <div class="col-md-6">
            <input id="orderemail" type="email" class="form-control" readonly value="{{ $restaurant->orderEmail }}" >

            
        </div>
    </div>

    <div class="row mb-3 ">
        <label for="orderphone" class="col-md-4 col-form-label text-md-end">{{ __('Order Phone') }}</label>

        <div class="col-md-6 ">
            <input id="orderphone" type="text" readonly class="form-control" value="{{ $restaurant->orderPhone }}"  >
        </div>
    </div>

    <div class="row mb-3">
        <label for="city" class="col-md-4 col-form-label text-md-end">City </label>
        <div class="col-md-6">
            <select name="city" id="city" class="custom-select">
                <option value="{{ $restaurant->city->id }}">{{ $restaurant->city->city }}</option>
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
    <div class="row mb-3">
        <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

        <div class="col-md-6">
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $restaurant->address }}" required autocomplete="new-address">

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputMDEx1" class="col-md-4 col-form-label text-md-end"> Opening time </label>

        <div class="col-md-6">
            <div class="md-form ">
                <input type="time" name="open" id="inputMDEx1" value="{{ $restaurant->open_time }}" class="form-control">
              </div>

            @error('open')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputMDEx2" class="col-md-4 col-form-label text-md-end"> Closing time </label>

        <div class="col-md-6">
            <div class="md-form ">
                <input type="time" name="close" id="inputMDEx2" value="{{ $restaurant->close_time }}" class="form-control">
              </div>

            @error('close')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">

        <label for="dayoff" class="col-md-4 col-form-label text-md-end"> Day Off </label>
        <div class="col-md-6">
           
            <select name="dayoff" id="dayoff" class="custom-select">
                <option selected>{{ $restaurant->day_off }}</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
                <option value="None">None</option>

            </select>

            @error('dayoff')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <div class="row mb-3">
        <label for="logo" class="col-md-4 col-form-label text-md-end">Your Logo</label>

        <div class="col-md-6">
            <img style=" width:110px " class="rounded mx-auto d-inline mb-2 " src="{{ asset('logo/'.$restaurant->logo)}} " >
            <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" value=" {{ $restaurant->logo }}" name="logo"  >

            @error('logo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <input type="hidden" name="img" value="{{ $restaurant->logo }}">

    <div class="row mb-4 mt-4">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-outline-primary">
                Update
            </button>
        </div>
    </div>
</form>

@endsection