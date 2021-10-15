@extends('layouts.default')
@section('content')
	<section class="user-dashboard page-wrapper">
	<div class="container">
		<section class="order-detail">
			<div class="row">
				<div class="col-md-12">
					<h2 style="margin-bottom: 20px;">Order Information</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<label>Order No</label>
					<p>#{{ $order->order_number }}</p>
				</div>
				<div class="col-md-4">
					<label>Order Date</label>
					<p>{{ date('M ,d Y',strtotime($order->created_at)) }}</p>
				</div>
				<div class="col-md-4">
					<label>Order Status</label>
					<p>{{ $order->order_status->name }}</p>
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-4">
					<label>Order Total</label>
					<p>{{ $order->subtotal }} ₹</p>
				</div>
				<div class="col-md-4">
					<label>Order Discount</label>
					<p>{{ $order->discount }} ₹</p>
				</div>
				<div class="col-md-4">
					<label>Grand Total</label>
					<p>{{ $order->total }} ₹</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<label>Billing Address</label>
					<ul>
       					<li>{{ $order->billing_address->name }}</li>
       					<li>{{ $order->billing_address->address }}</li>
       					<li>{{ $order->billing_address->city.', '.$order->billing_address->state->name.' '.$order->billing_address->pin_code }}</li>
       					<li>Phone:- {{ $order->billing_address->phone_no }}</li>
       				</ul>
				</div>
				<div class="col-md-4">
					<label>Shipping Address</label>
					<ul>
       					<li>{{ $order->shipping_address->name }}</li>
       					<li>{{ $order->shipping_address->address }}</li>
       					<li>{{ $order->shipping_address->city.', '.$order->shipping_address->state->name.' '.$order->shipping_address->pin_code }}</li>
       					<li>Phone:- {{ $order->shipping_address->phone_no }}</li>
       				</ul>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</section>
		<div class="row">
			<div class="col-md-12">
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Image</th>
									<th>Product Name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Subtotal (₹)</th>
									<th>Discount (₹)</th>
									<th>Total Price (₹)</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@if(count($items) > 0)
									@foreach($items as $item)
										<tr>
											<td><img style="width: 40px;" class="img-responsive" src="{{ url('/public/images/logo.png') }}" alt="product-img" /></td>
											<td>{{ $item->product->product_name}}</td>
											<td>{{  $item->price }}</td>
											<td>{{ $item->quantity }}</td>
											<td>{{ $item->subtotal }}</td>
											<td>{{ $item->discount }}</td>
											<td>{{ $item->total }}</td>
											<td><span class="label label-primary">{{ $item->order_status->name }}</span></td>
										</tr>
									@endforeach
								@else
									<tr>
										<td colspan="6">No orders found</td>
									</tr>
								@endif
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop