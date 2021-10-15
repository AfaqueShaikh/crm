@extends('layouts.default')
@section('content')
	<section class="user-dashboard page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Date</th>
									<th>Items</th>
									<th>Total Price (₹)</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@if(count($orders) > 0)
									@foreach($orders as $order)
										<tr>
											<td>#{{$order->order_number }}</td>
											<td>{{ date('M ,d Y',strtotime($order->created_at)) }}</td>
											<td>{{ $order->items_count }}</td>
											<td>{{ $order->total }}</td>
											<td><span class="label label-primary">{{ $order->order_status->name }}</span></td>
											<td><a href="{{ url('orders')}}/{{ $order->id }}" class="btn btn-default">View</a></td>
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