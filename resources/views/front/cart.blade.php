@extends('layouts.app')
@section('content')
<div class="mt-4"> 		
	<div class="container padding-bottom-3x mb-1">
		
		<!-- Shopping Cart-->
		@if (empty($products))
		<div class="table-responsive shopping-cart">
			<table class="table">
				<thead>
					<tr>
						<th>Product Name</th>
						<th class="text-center">Price</th>
						<th class="text-center">Quantity</th>
						<th class="text-center">Subtotal</th>
						<th class="text-center">
						<form action="{{ route('product.destroycart',$id) }}" method="post">
							@csrf
							@method('delete')
							<button class="btn btn-sm btn-outline-danger" >Clear Cart</button>
						</form>
					    </th>
					</tr>
				</thead>
				
			</table>	
			<a class="btn btn-outline-danger mt-5" href="{{ route('Restaurant.show',$id) }}">
				<i class="icon-arrow-left"></i>
				&nbsp;Back to Shopping</a>

	  </div>

		@else
				
		<div class="table-responsive shopping-cart">
			<table class="table">
				<thead>
					<tr>
						<th>Product Name</th>
						<th class="text-center">Price</th>
						<th class="text-center">Quantity</th>
						<th class="text-center">Subtotal</th>
						<th class="text-center">
						<form action="{{ route('product.destroycart',$id) }}" method="post">
							@csrf
							@method('delete')
							<button class="btn btn-sm btn-outline-danger" >Clear Cart</button>
						</form>
					    </th>
					</tr>
				</thead>
				<tbody>
					@foreach ($products as $product)
					<tr>
						<td>
							<div style="background-color: rgba(245, 244, 244, 0.966)" class="product-item" >
								<a class="product-thumb" href="#">
									<img  src="{{ asset('images/'.$product->associatedModel->image)}}" alt="Product"></a>
								<div class="product-info">
									<h4 class="product-title fs-4">{{ $product->name }}</h4>
								</div>
							</div>
						</td>
						<td class="text-center fs-5 ">{{ $product->price }}</td>
						
						<td class="text-center">
						<form action="{{ route('product.updatecart',$product->id) }}" method="post">
							@csrf
							@method('put')
							<div class="count-input">
								<input type="number" name="quantity" class="form-control text-center" min="1" value="{{ $product->quantity }}">
							</div>
							<button  class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
						</form>
					    </td>	
						 
						<td class="text-center fs-5">{{ $product->price*$product->quantity }} DH</td>
						<td class="text-center">
							<form action="{{ route('product.deletecart',$product->id) }}" method="POST" >
								@csrf
								@method('put')
								<button class="remove-from-cart btn" style="border: none" ><i class="fa fa-trash"></i></button>
							
							</form>
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
		
		<div class="shopping-cart-footer">
			
			<h5 class="column " style="color: rgb(243, 97, 0)"> + Delivery Fees: 20 DH</h5>
			<h5 class="column ">Total: {{ $total + 20 }} DH</h5>
		</div>
		<div class="shopping-cart-footer ">
			<div class="column"><a class="btn btn-outline-info" href="{{ route('Restaurant.show',$id) }}"><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a></div>
			<div class="column">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Order Now</button>
			</div>
    	</div>

  <!-- Modal -->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog ">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Details</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>	
		<form action="{{ route('Order.store',['id'=>$id]) }}" method="post">
			@csrf
		<div class="modal-body mx-2"> 

			<div class="form-group">
				<strong class="fs-6  my-3">{{ __('Phone') }}:</strong>
				<br>
				<input required  type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Your Phone Number" value="{{ $info->phone }}">
				@error('phone')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="form-group">

				<strong class="fs-6  my-3">{{ __('City') }}:</strong>

					<select name="city" id="city" class="form-control text-dark @error('city') is-invalid @enderror">
						<option selected value="{{ $info->city->id }}">{{ $info->city->city }}</option>
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
				<div class="form-group my-2">
					<strong class="fs-6  my-3">{{ __('Address') }}:</strong>
					<input required type="text" class="form-control  @error('address') is-invalid @enderror" value="{{ $info->address }}" name="address">
					@error('address')
					<div class="invalid-feedback">{{ $message }}</div>
			    	@enderror
				</div>
				<div class="form-group my-2 ">
					<strong class="fs-6 my-3">{{ __('Comment') }}:</strong>
 					<textarea name="comment" class="form-control" id="comment" cols="50" rows="4"></textarea>			
				</div>				
			</div>	
		
		 <div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		  <button type="submit" class="btn btn-outline-success">Confirm Order</button>
		</div>	
		</form>
		</div>
		
	   
	  </div>
	</div>

   @endif


	@endsection
