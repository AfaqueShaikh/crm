@extends('layouts.default')
@section('content')
	<section class="signin-page account">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-6 col-md-offset-3">
	        <div class="block text-center">
	          @include('partials._messages')
	          <h2 class="text-center">Update Address</h2>
	          <form class="text-left clearfix" method="post" action="{{ url('addresses') }}/{{$address->id}}">
	          	{{ csrf_field() }}
	          	@method('put')

	          	<div class="form-group">
	            	<select name="address_type" class="form-control">
	            	    <option>Select Address Type</option>
	            			<option value="1" {{ $address->address_type==1?'selected':'' }}>Billing Address</option>
	            			<option value="2" {{ $address->address_type==2?'selected':'' }}>Shipping Address</option>
	            	</select>
	            </div>
	            <div class="form-group">
	              <input type="text" class="form-control" name="name" value="{{ $address->name }}" placeholder="Name">
	            </div>
	            <div class="form-group">
	              <textarea class="form-control" name="address" placeholder="Enter Address">{{ $address->address }}</textarea>
	            </div>
	            <div class="form-group">
	            	<select name="state" class="form-control" required>
	            	    <option>Select State</option>
	            		@if(count($states) > 0)
	            			@foreach ($states as $state)
	            				<option {{ $state->id==$state->id?'selected':'' }} value="{{ $state->id }}">{{ $state->name}}</option>
	            			@endforeach
	            		@endif
	            	</select>
	            </div>
	            
	            <div class="form-group">
	              <input type="text" class="form-control" name="city" value="{{ $address->city }}" placeholder="City">
	            </div>
	            <div class="form-group">
	                <input type="number" class="form-control" name="pin_code" value="{{ $address->pin_code }}" placeholder="Pin Code">
	            </div>
	            <div class="form-group">
	                <input type="number" class="form-control" name="phone_no" value="{{ $address->phone_no }}" placeholder="Phone Number">
	            </div>
	            <div class="form-group">
	            	<label style="font-weight:normal;">Is Default Address</label>
	            	<input type="checkbox" {{ $address->is_default_address==1?'checked':'' }} name="is_default_address" value="1">
	               {{--  <input type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}" placeholder="Phone Number"> --}}
	            </div>
	            <div class="text-center">
	              <button type="submit" class="btn btn-main text-center">Update Address</button>
	            </div>
	          </form>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
@stop