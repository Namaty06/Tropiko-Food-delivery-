@extends('layouts.app')

@section('content')

  <div class="container">
  <div class="hero_area ">
   
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div>
                          <h1>
                            Welcome to <br />
                            Tropiko
                          </h1>
                          <p>
                            Tropiko est une application web basé sur (Cash On Delivery) payement a la Livraison qui offre au Restaurant et Supermarché Un service de livraison A domicile et la gestion des Commandes, et aussi offre au client Le service le plus simple et le plus rapide pour commander Leur Repas dans n'importe quel restaurant.
                          </p>
                          <div class="d-flex">
                            @auth
                            <a href="{{ route('History.index') }}" class="text-center custom_orange-btn mr-3">
                              My Orders 

                            </a>
                            @endauth
                            @guest
                                <a href="" class="text-uppercase custom_orange-btn mr-3">
                               Shop Now
                            </a>
                            <a href="{{ route('login') }}" class="text-uppercase custom_dark-btn">
                              Contact Us
                            </a> 
                            @endguest
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img  src="{{ asset('images/moto.png') }}" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        </div>
       
      </div>
    </section>
  </div>
  
  <section class="service_section layout_padding ">
    <div class="container">
      <h2 class="custom_heading">Our Restaurants </h2>
      
      <div class=" layout_padding2">
        <div class="card-deck">
          @foreach ($restaurants as $restaurant)
         

          <div class="card">
            <img style="width: 200px" class="card-img-top" src="{{  asset('logo/'.$restaurant->logo)  }}" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">{{ $restaurant->name }}</h5>
            </div>
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
              <div class="text-center"> 

                @if($restaurant->day_off != $t)    
                 
                   <a class="btn btn-outline-primary mt-auto" href="{{ route('Restaurant.show',['id'=>$restaurant->id]) }}">Show</a>
                     
                @else
                <a class="btn btn-danger mt-auto" style="color: wheat">Closed</a>     
                @endif

                
              </div>
          </div>
          </div>

         @endforeach
        </div>
      </div>
      
    </div>
  </section>

       
 <h1 class="custom_heading mb-4">Join Us</h1> 

  <div class="row mt-3 ml-5">
    
      <div class="col-md-4">
         <img class="bd-placeholder-img rounded-circle" width="160" height="150"  src="https://res.cloudinary.com/glovoapp/image/fetch//w_254,h_220,c_fit,f_auto,q_auto:best/dpr_auto/https://glovoapp.com/images/corporate/partners-image.png" alt="">
        <h4 class="fw-normal mt-2">Devenir partenaire</h4>
        <p>Grandissez avec Glovo ! Boostez les ventes et accédez à de nouvelles opportunités grâce à notre technologie et à notre base d'utilisateurs !</p>
      </div><!-- /.col-md-4 -->
      <div class="col-md-4">
        <img class="bd-placeholder-img rounded-circle" width="160" height="150"  src="https://res.cloudinary.com/glovoapp/image/fetch//w_254,h_220,c_fit,f_auto,q_auto:best/dpr_auto/https://glovoapp.com/images/corporate/rider-image.png" alt="">
        <h4 class="fw-normal mt-2">Devenir coursier  </h4>
        <p>C'est vous le chef ! Livrez avec Glovo pour gagner des revenus compétitifs en toute flexibilité et liberté. </p>
      </div><!-- /.col-md-4 -->
      <div class="col-md-4 ">
        <img class="bd-placeholder-img rounded-circle" width="160" height="150"  src="https://res.cloudinary.com/glovoapp/image/fetch//w_254,h_220,c_fit,f_auto,q_auto:best/dpr_auto/https://glovoapp.com/images/corporate/carrers-image.png" alt="">

        <h4 class="fw-normal mt-2">Emploi </h4>
        <p>ous cherchez un nouveau défi ? Si vous faites preuve d'ambition et d'humilité et aimez travailler en équipe, contactez-nous !</p>
      </div><!-- /.col-md-4 -->
    </div>
  </div>

  <main>
    <div style="background-color: white" class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center ">
      <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h3 class="display-6 fw-normal">Tropika Application</h3>
        <p class="lead fw-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple’s marketing pages.</p>
        <a class="btn btn-outline-primary" href="#">Coming soon</a>
      </div>
      <div class="product-device shadow-sm d-none d-md-block"></div>
      <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>
  </main>
  
  <!-- footer section -->
  <section class="container-fluid footer_section mt-5">
      <p>
        Copyright &copy; 2022 All Rights Reserved By Tropiko
      </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/bootstrap.js"></script>

  
@endsection