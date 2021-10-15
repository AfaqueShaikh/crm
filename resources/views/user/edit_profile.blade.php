@extends('layouts.default')

@section('content')
	<section class="signin-page account">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-6 col-md-offset-3">
	        <div class="block text-center">
	          @include('partials._messages')
	          <a class="logo" href="index.html">
	            {{-- <img src="{{ url('/images/logo.png') }}" alt=""> --}}
	            <img src="{{ URL::asset('images/logo.png') }}" alt="">
	          </a>
	          <h2 class="text-center">Update Profile</h2>
	          <form class="text-left clearfix" method="post" action="{{ url('users') }}/{{$user->id}}">
	          	{{ csrf_field() }}
	          	@method('put')
	            <div class="form-group">
	              <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" placeholder="First Name">
	            </div>
	            <div class="form-group">
	              <input type="text" class="form-control" name="last_name"  value="{{ $user->last_name }}" placeholder="Last Name">
	            </div>
	            <div class="form-group">
	              <input type="text" class="form-control" name="user_name" value="{{ $user->user_name }}" placeholder="Username">
	            </div>
	            <div class="form-group">
	              <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email">
	            </div>
	            <div class="text-center">
	              <button type="submit" class="btn btn-main text-center">Update Profile</button>
	            </div>
	          </form>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
@stop