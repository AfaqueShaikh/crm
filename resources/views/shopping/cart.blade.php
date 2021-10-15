@extends('layouts.default')
@section('content')
	
	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<h1 class="page-name">Cart</h1>
						<ol class="breadcrumb">
							<li><a href="index.html">Home</a></li>
							<li class="active">cart</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="page-wrapper">
	  <div class="cart shopping">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	          <div class="block">
	            <div class="product-list">
	              <form method="post">
	              	@include('partials._messages')
	                <table class="table">
	                  <thead>
	                    <tr>
	                      <th class="" style="width:80px;">Image</th>
	                      <th class="">Item Name</th>
	                      <th class="">Item Price</th>
	                      <th class="">Quantity</th>
	                      <th class="">Subtotal</th>
	                      <th class="">Actions</th>
	                    </tr>
	                  </thead>
	                  <tbody>
	                  	@foreach ($items as $item)
		                    <tr class="">
		                      <td><img style="width: 60px;" class="img-responsive" src="{{ url('/public/images/logo.png') }}" alt="product-img" /></td>
		                      <td class="">
		                        <div class="product-info">
		                          <img width="80" src="images/shop/cart/cart-1.jpg" alt="" />
		                          <a href="{{ url('/products/') }}/{{$item->id}}">{{ $item->name }}</a>
		                        </div>
		                      </td>
		                      <td class="">{{ $item->price }}</td>
		                      <td class="">
		                      		<input id="product-quantity" item_id="{{ $item->id }}" type="number" value="{{ $item->quantity }}" name="product-quantity">
		                      </td>
		                      <td class="subtotal">{{ $item->price * $item->quantity }}</td>
		                      <td class="">
		                      	{{-- <form method="post" method="post" action="{{ url('remove-from-cart') }}">
									{{ csrf_field() }}
									<button type="submit" class="product-remove">Remove</button> --}}
		                        <a class="product-remove" href="{{ url('remove-from-cart') }}/{{ $item->id }}">Remove</a>
		                    	</form>
		                      </td>
		                    </tr>
	                    @endforeach
	                  </tbody>
	                </table>
	                <a href="{{ url('checkout') }}" class="btn btn-main pull-right">Checkout</a>
	              </form>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
@stop
@section('javascript')
	<script type="text/javascript">
		$(document).ready(function(){
			$('body').on('change','#product-quantity',function(){
				let quantity=$(this).val();
				let item_id=$(this).attr('item_id');
				$.ajax({
					type:'POST',
					url:"{{ url('update-cart-quantity') }}",
					context: this,
					data:{
						quantity:quantity,
						item_id:item_id,
					},
					success:function(response)
					{	
						// var res = parseJSON(response);
						// var res = JSON.parse(response);
						if(response.status==1)
						{
							$(this).parents('tr').find('.subtotal').html(response.subtotal);
							$('.cart-quantity').html(response.total_cart_quantity)
						}
						else
						{	
							
						}
					}
				});

			});
		});
	</script>
@stop