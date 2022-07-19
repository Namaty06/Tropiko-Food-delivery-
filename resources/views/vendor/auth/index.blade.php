@extends('layouts.index')
@section('content')
    
  
    <h1>HOME VENDOR</h1>  
    <a class="btn btn-danger" href="{{route('vendor.logout')}}"></a> 

    <a href="{{route('vendor.Restaurant.create')}}">Create</a>
    
@endsection
