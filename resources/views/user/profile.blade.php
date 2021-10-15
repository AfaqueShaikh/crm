@extends('layouts.default')
@section('content')
	<section class="user-dashboard page-wrapper">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-12">
	        <div class="dashboard-wrapper dashboard-user-profile">
	          @include('partials._messages')
	          <div class="media">
	            <div class="pull-left text-center" href="#!">
	              <img class="media-object user-img" style="width: 120px;" src="{{ URL::asset('public/images/avater.jpg') }}" alt="Image">
	              <a href="{{ url('/users') }}/{{ base64_encode($user->id) }}" class="btn btn-transparent mt-20">Update Profile</a>
	              <a href="{{ url('/change-password') }}" style="display: block;" class="btn btn-transparent mt-20 d-block">Change Password</a>
	            </div>
	            <div class="media-body">
	              <ul class="user-profile-list">
	                <li><span>Full Name:</span>{{ $user->first_name.' '.$user->last_name }}</li>
	                <li><span>User Name:</span>{{ $user->user_name }}</li>
	                <li><span>Email:</span>{{ $user->email }}</li>
	                {{-- <li><span>Phone:</span>{{ $user->phone_no }}</li> --}}
	              </ul>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
@stop