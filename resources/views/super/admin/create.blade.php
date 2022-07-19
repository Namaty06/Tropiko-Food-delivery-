@extends('layouts.dashboard')
@section('content')


<div class="col-md-8">
    <div class="card">
        <div class="card-header">Admin</div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.Admin.store') }}">
                @csrf

                <div class="row mb-3">
                    <label for="cin" class="col-md-4 col-form-label text-md-end">{{ __('Cin') }}</label>

                    <div class="col-md-6">
                        <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror" name="cin" value="{{ old('cin') }}" required autocomplete="cin" autofocus>

                        @error('cin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

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
                    <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                    <div class="col-md-6 input-group">
                        <span class="input-group-text" id="basic-addon1">+212</span>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="city" class="col-md-4 col-form-label text-md-end">City </label>

                    <div class="col-md-6">
                        <select name="city" id="city" class="custom-select custom-select-sm text-dark @error('city') is-invalid @enderror">
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
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6 input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <span class="input-group-text">
                            <i class="far fa-eye" id="togglePassword" 
                           style="cursor: pointer"></i>
                           </span>
                        @error('password')
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

@endsection
