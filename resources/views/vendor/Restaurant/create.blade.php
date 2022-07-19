@extends('layouts.index')
@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4" >
                <div class="card-header">Restaurant</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('vendor.Restaurant.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Restaurant Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="orderemail" type="email" class="form-control @error('orderemail') is-invalid @enderror" name="orderemail" value="{{ old('orderemail') }}" required autocomplete="email">

                                @error('orderemail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 ">
                            <label for="orderphone" class="col-md-4 col-form-label text-md-end">{{ __('Order Phone') }}</label>
        
                            <div class="col-md-6 ">
                                <input id="orderphone" type="text" class="form-control @error('orderphone') is-invalid @enderror" name="orderphone" placeholder="+212" value="{{ old('orderphone') }}" required autocomplete="orderphone" autofocus>
        
                                @error('orderphone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">City </label>
                            <div class="col-md-6">
                                <select name="city" id="city" class="form-select">
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
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="new-address">

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
                                    <input type="time" name="open" id="inputMDEx1" class="form-control">
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
                                    <input type="time" name="close" id="inputMDEx2" class="form-control">
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
                               
                                <select name="dayoff" id="dayoff" class="form-select">
                                    <option selected>None</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>

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
                                <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" required >

                                @error('logo')
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection