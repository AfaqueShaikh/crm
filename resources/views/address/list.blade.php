@extends('layouts.default')
@section('content')
	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<h1 class="page-name">Dashboard</h1>
						<ol class="breadcrumb">
							<li><a href="index.html">Home</a></li>
							<li class="active">my account</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="user-dashboard page-wrapper">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-12">
	        {{-- <ul class="list-inline dashboard-menu text-center">
	          <li><a href="dashboard.html">Dashboard</a></li>
	          <li><a href="order.html">Orders</a></li>
	          <li><a class="active" href="address.html">Address</a></li>
	          <li><a href="profile-details.html">Profile Details</a></li>
	        </ul> --}}
	        @include('partials._messages')
	        <a href="{{ url('addresses/add') }}" class="btn btn-main btn-medium btn-round-full  btn-icon">Add Address</a>
	        <div class="dashboard-wrapper user-dashboard">
	          <div class="table-responsive">
	            <table class="table">
	              <thead>
	                <tr>
	                  <th>Address Type</th>
	                  <th>Name</th>
	                  <th>Address</th>
	                  <th>Phone</th>
	                  <th>Is Default Address</th>
	                  <th></th>
	                </tr>
	              </thead>
	              <tbody>
	              	@if(count($addresses) > 0)
	              		@foreach($addresses as $add)
			                <tr>
			                  <td>{{ $add->address_type==1?'Billing Address':'Shipping Address' }}</td>
			                  <td>{{ $add->name }}</td>
			                  <td>{{ $add->address }}</td>
			                  <td>{{ $add->phone_no }}</td>
			                  <td>{{ $add->is_default_address==1?'Yes':'No' }}</td>
			                  <td>
			                    <div class="btn-group" role="group">
			                      {{-- <button type="button" class="btn btn-default"><i class="tf-pencil2" aria-hidden="true"></i></button> --}}
			                      <a class="btn btn-default" href="{{ url('/addresses') }}/{{ base64_encode($add->id) }}"><i class="tf-pencil2" aria-hidden="true"></i></a>
			                      <form  style="display: inline-block;" method="post" action="{{ url('addresses') }}/{{ base64_encode($add->id) }}">
			                      	{{ csrf_field() }}
			                      	@method('delete')
			                      	  <button type="submit" class="btn btn-default"><i class="tf-ion-close" aria-hidden="true"></i></button>
			                      </form>
			                    </div>
			                  </td>
			                </tr>
			            @endforeach
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