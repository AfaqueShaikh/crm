@extends('layouts.default')
@section('content')
	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<h1 class="page-name">Checkout</h1>
						<ol class="breadcrumb">
							<li><a href="index.html">Home</a></li>
							<li class="active">checkout</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="page-wrapper">
	   <div class="checkout shopping">
	      <div class="container">
	         <div class="row">
	            <div class="col-md-8">
	               <div class="block billing-details">
	               	<form method="post" method="post" action="{{ url('create_order') }}">
							{{ csrf_field() }}
	               	<h4 style="display: flex;justify-content: space-between;align-items: center;" class="widget-title">Billing Details  <a href="{{ url('addresses/add') }}" class="btn btn-main btn-medium btn-round-full  btn-icon">Add Address</a></h4>
	               	@if(count($billing_addresses) > 0)
	               		{{-- <div class='row'> --}}
	               		@foreach($billing_addresses as $key=>$add)
	               			<div class="col-md-4 address_wrapper">
	               				<input type="radio" {{ $add->is_default_address==1?'checked':'' }} id="{{ $add->id }}" name="billing_address" value="{{ $add->id }}">
	               				<label for="{{ $add->id }}"><ul>
	               					<li><b>{{ $add->name }}</b></li>
	               					<li>{{ $add->address }}</li>
	               					<li>{{ $add->city.', '.$add->state->name.' '.$add->pin_code }}</li>
	               					<li>Phone:- {{ $add->phone_no }}</li>
	               				</ul></label>
	               				
	               			</div>
		               		@if($key % 2 == 0) 
		               			{{-- </div><div class="row"> --}}
		               		@endif
	               		@endforeach
	               		{{-- <a href="{{ url('confirmation') }}" class="btn btn-main mt-20">Place Order</a > --}}
	               	@endif
	               	<p style="opacity:0;clear: both;">sdf</p>
	               	<h4 style="display: flex;justify-content: space-between;align-items: center;" class="widget-title">Shipping Details  <a href="{{ url('addresses/add') }}" class="btn btn-main btn-medium btn-round-full  btn-icon">Add Address</a></h4>
	               	@if(count($shipping_addresses) > 0)
	               		@foreach($shipping_addresses as $add)
	               			<div class="col-md-4 address_wrapper">
	               				<input type="radio" {{ $add->is_default_address==1?'checked':'' }} id="{{ $add->id }}" name="shipping_address" value="{{ $add->id }}">
	               				<label for="{{ $add->id }}">
	               					<ul>
		               					<li><b>{{ $add->name }}</b></li>
		               					<li>{{ $add->address }}</li>
		               					<li>{{ $add->city.', '.$add->state->name.' '.$add->pin_code }}</li>
		               					<li>Phone:- {{ $add->phone_no }}</li>
		               				</ul>
	               				</label>
	               			</div>
	               		@endforeach
	               		
	               	@endif

	               	<div class="row">
	               		<div class="col-md-12">
	               			<input type="submit" class="btn btn-main mt-20" value="Place Order" name="submit">
	               			{{-- <a href="{{ url('confirmation') }}" class="btn btn-main mt-20"></a > --}}
	               		</div>
	               	</div>
	               	</form>
	                  {{-- <h4 class="widget-title">Billing Details</h4>
	                  <form class="checkout-form">
	                     <div class="form-group">
	                        <label for="full_name">Full Name</label>
	                        <input type="text" class="form-control" id="full_name" placeholder="">
	                     </div>
	                     <div class="form-group">
	                        <label for="user_address">Address</label>
	                        <input type="text" class="form-control" id="user_address" placeholder="">
	                     </div>
	                     <div class="checkout-country-code clearfix">
	                        <div class="form-group">
	                           <label for="user_post_code">Zip Code</label>
	                           <input type="text" class="form-control" id="user_post_code" name="zipcode" value="">
	                        </div>
	                        <div class="form-group" >
	                           <label for="user_city">City</label>
	                           <input type="text" class="form-control" id="user_city" name="city" value="">
	                        </div>
	                     </div>
	                     <div class="form-group">
	                        <label for="user_country">Country</label>
	                        <input type="text" class="form-control" id="user_country" placeholder="">
	                     </div>
	                  </form> --}}
	               </div>
	               {{-- <div class="block">
	                  <h4 class="widget-title">Payment Method</h4>
	                  <p>Credit Cart Details (Secure payment)</p>
	                  <div class="checkout-product-details">
	                     <div class="payment">
	                        <div class="card-details">
	                           <form  class="checkout-form">
	                              <div class="form-group">
	                                 <label for="card-number">Card Number <span class="required">*</span></label>
	                                 <input  id="card-number" class="form-control"   type="tel" placeholder="•••• •••• •••• ••••">
	                              </div>
	                              <div class="form-group half-width padding-right">
	                                 <label for="card-expiry">Expiry (MM/YY) <span class="required">*</span></label>
	                                 <input id="card-expiry" class="form-control" type="tel" placeholder="MM / YY">
	                              </div>
	                              <div class="form-group half-width padding-left">
	                                 <label for="card-cvc">Card Code <span class="required">*</span></label>
	                                 <input id="card-cvc" class="form-control"  type="tel" maxlength="4" placeholder="CVC" >
	                              </div>
	                              <a href="{{ url('confirmation') }}" class="btn btn-main mt-20">Place Order</a >
	                           </form>
	                        </div>
	                     </div>
	                  </div>
	               </div> --}}
	            </div>
	            <div class="col-md-4">
	               <div class="product-checkout-details">
	                  <div class="block">
	                     <h4 class="widget-title">Order Summary</h4>
	                     @foreach ($items as $item)
	                     <div class="media product-card">
	                        <a class="pull-left" href="product-single.html">
	                           <img class="media-object" src="{{ url('/public/images/logo.png') }}" alt="Image" />
	                        </a>
	                        <div class="media-body">
	                        	
		                           <h4 class="media-heading"><a href="{{ url('/products/') }}/{{$item->id}}">{{ $item->name }}</a></h4>
		                           <p class="price">{{ $item->quantity }} x {{ $item->price }}</p>
		                           {{-- <span class="remove" >Remove</span> --}}
		                            <a class="remove" href="{{ url('remove-from-cart') }}/{{ $item->id }}">Remove</a>
	                          
	                        </div>
	                     </div>
	                      @endforeach
	                     <div class="discount-code">
	                        <p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal" href="#!">enter it here</a></p>
	                     </div>
	                     <ul class="summary-prices">
	                        <li>
	                           <span>Subtotal:</span>
	                           <span class="price">{{ $subTotal }}</span>
	                        </li>
	                        <li>
	                           <span>Shipping:</span>
	                           <span>Free</span>
	                        </li>
	                     </ul>
	                     <div class="summary-total">
	                        <span>Total</span>
	                        <span>{{ $total }}</span>
	                     </div>
	                     <div class="verified-icon">
	                        <img src="public/images/shop/verified.png">
	                     </div>
	                  </div>
	               </div>
	            </div>
	         </div>
	      </div>
	   </div>
	</div>
   	<!-- Modal -->
    <div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-body">
               <form>
                  <div class="form-group">
                     <input class="form-control" type="text" placeholder="Enter Coupon Code">
                  </div>
                  <button type="submit" class="btn btn-main">Apply Coupon</button>
               </form>
            </div>
         </div>
      </div>
    </div>
@stop