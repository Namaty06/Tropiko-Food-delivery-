@extends('layouts.app')
@section('content')
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <div class="col-md-4 ml-5">           
            
                <form action="" method="post">
                <select name="city" id="city" class="form-control text-dark">
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->city }}</option>
                    @endforeach
                </form>
                </select>
            </div> 
        </div>
    </div>
</header>

<!-- Section-->
 <section class="py-3">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center">      
            @foreach ($restaurants as $restaurant)    
            <div class="col mb-3">
                <div class="card h-100 ">   
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{ $restaurant->status }}</div>
                    <img class="card-img-top" src="{{ asset('logo/'.$restaurant->logo) }}" alt="..." />                    
                    <div class="card-body p-4">
                        <div class="text-center">        
                            <h5 class="fw-bolder">{{ $restaurant->name }}</h5>                         
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"> 
                            <a class="btn btn-outline-dark mt-auto" href="{{ route('Restaurant.show',['id'=>$restaurant->id]) }}">Show</a>
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    </div>

         
@endsection