@extends('layouts.default')
@section('content')
	<section class="signin-page account">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-6 col-md-offset-3">
	        <div class="block text-center">
	          @include('partials._messages')
	          <h2 class="text-center">Add Address</h2>
	          <form class="text-left clearfix" method="post" action="{{ url('addresses') }}">
	          	{{ csrf_field() }}

	          	<div class="form-group">
	            	<select name="address_type" class="form-control">
	            	    <option>Select Address Type</option>
	            			<option value="1">Billing Address</option>
	            			<option value="2">Shipping Address</option>
	            	</select>
	            </div>
	            <div class="form-group">
	              <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
	            </div>
	            <div class="form-group">
	              <textarea class="form-control" name="address" placeholder="Enter Address">{{ old('address') }}</textarea>
	            </div>
	            <div class="form-group">
	            	<select name="state" class="form-control" required>
	            	    <option>Select State</option>
	            		@if(count($states) > 0)
	            			@foreach ($states as $state)
	            				<option value="{{ $state->id }}">{{ $state->name}}</option>
	            			@endforeach
	            		@endif
	            	</select>
	            </div>
	            
	            <div class="form-group">
	              <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="City">
	            </div>
	            <div class="form-group">
	                <input type="number" class="form-control" name="pin_code" value="{{ old('pin_code') }}" placeholder="Pin Code">
	            </div>
	            <div class="form-group">
	                <input type="number" class="form-control" name="phone_no" value="{{ old('phone_no') }}" placeholder="Phone Number">
	            </div>
	            <div class="form-group">
	            	<label style="font-weight:normal;">Is Default Address</label>
	            	<input type="checkbox" name="is_default_address" value="1">
	               {{--  <input type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}" placeholder="Phone Number"> --}}
	            </div>
	            <div class="text-center">
	              <button type="submit" class="btn btn-main text-center">Add Address</button>
	            </div>
	          </form>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
@stop