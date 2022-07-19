
@extends('layouts.app')
@section('content')

<!-- Product Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end mb-3">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">{{ $restaurant->name }}</h1>
                    <h3 class="display-6 ml-2 mb-3">Our Products</h3>
                    <p class="ml-3">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <a class="font-weight-bolder nav-link" style="font-size: 20px ; color:rgb(255, 84, 22)" href="{{ route('Order.create',$restaurant->id) }}" > <i class="fa fa-shopping-bag">               
                     <span style=" position: absolute;
                     font-size: xx-small;
                     margin-left: -5px;
                     margin-top: -10px;
                     background-color: var(--orange);
                     color: white;" class='badge badge-warning' >{{ $count}}  </span>  Shopping Cart  </i>
                </a>

            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    
                 @foreach ($restaurant->product as $product)
               
                    
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                       <form action="{{ route('product.cart',['id'=>$restaurant->id,'idp'=>$product->id]) }}" method="post">
                    @csrf 
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset('images/'.$product->image) }}" alt="">
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-2 py-1 px-2">New</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="">{{ $product->name }}</a>
                                <span class=" d-block text-success h6 me-1">{{ $product->category->category }} </span>
                                <span class="text-info h6 me-1">{{ $product->price }} DH</span>
                                <span class="text-body text-decoration-line-through">{{ $product->price+15 }} DH</span>
                            </div>
                            <div class="d-flex border-top">
                                <small class="w-50 text-center py-2">
                                    <button class="btn btn-danger" style="border-color:white; background-color:white; font-size:15px ; color: orangered ;" ><i class="fa fa-shopping-bag  me-2"> </i> Add to cart</button>
                                </small>
                            </div>
                        </div>
                       
                    </div>
                    </form>
          
                    @endforeach
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- Product End -->

@endsection