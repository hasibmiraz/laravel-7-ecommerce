@extends('layouts.app')

@section('title')
	Checkout
@endsection

@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
			{!! Form::open(['route' => 'product.checkout', 'method' => 'POST', 'class' => 'billing-form', 'id' => 'checkout-form']) !!}
					<h3 class="mb-4 billing-heading">Billing Details</h3>
					@if (Session::has('error'))
						<div class="alert alert-danger">
							{{ Session::get('error') }}
						</div>
					@endif
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Full Name</label>
	                  <input type="text" class="form-control" placeholder="Full Name" name="firstname">
	                </div>
				  </div>
				  
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="address">Address</label>
		            		<input type="text" class="form-control" placeholder="Address" name="address">
		            	</div>
					</div>
					
		            <div class="col-md-12">
						<div class="form-group">
							<label for="lastname">Name on Card</label>
						  <input type="text" class="form-control" placeholder="Name on Card" name="lastname" id="card-name">
						</div>
					  </div>
					
		            <div class="col-md-12">
		            	<div class="form-group">
							<label for="card-name">Number</label>
	                  <input type="text" class="form-control" placeholder="Card Number" name="card-number" id="card-number">
	                </div>
					</div>
					
		            <div class="col-md-6">
		            	<div class="form-group">
							<label for="date">Expiration Month</label>
	                  <input type="text" class="form-control" name="date" id="card-expiry-month">
	                </div>
					</div>

		            <div class="col-md-6">
		            	<div class="form-group">
							<label for="date">Expiration Year</label>
	                  <input type="text" class="form-control" name="date" id="card-expiry-year">
	                </div>
					</div>

		            <div class="col-md-12">
		            	<div class="form-group">
							<label for="date">CVC</label>
	                  <input type="text" class="form-control" name="date" id="card-cvc">
	                </div>
					</div>
					<input type="submit" value="Buy Now" class="btn btn-primary">
				</div>
				
				{!! Form::close() !!}<!-- END -->

				</div>
				<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
							<span>Subtotal</span>
							<span>$20.60</span>
						</p>
						<p class="d-flex">
							<span>Delivery</span>
							<span>$0.00</span>
						</p>
						<p class="d-flex">
							<span>Discount</span>
							<span>$3.00</span>
						</p>
						<hr>
						<p class="d-flex total-price">
							<span>Total</span>
							<span>${{ Session::get('cart')->totalPrice }}</span>
						</p>
					</div>
				</div>
	          	
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
	</section> <!-- .section -->
	@endsection

@section('scripts')
<script src="https://js.stripe.com/v2/"></script>
<script src="{{ asset('src/js/checkout.js') }}"></script>
  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
@endsection