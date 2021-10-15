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
	          <h2 class="text-center">Create Your Account</h2>
	          <form class="text-left clearfix" method="post" action="{{ url('users') }}">
	          	{{ csrf_field() }}
	            <div class="form-group">
	              <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
	            </div>
	            <div class="form-group">
	              <input type="text" class="form-control" name="last_name"  value="{{ old('last_name') }}" placeholder="Last Name">
	            </div>
	            <div class="form-group">
	              <input type="text" class="form-control" name="user_name" value="{{ old('user_name') }}" placeholder="Username">
	            </div>
	            <div class="form-group">
	              <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
	            </div>
	            <div class="form-group">
	              <input type="password" class="form-control" name="password" placeholder="Password">
	            </div>
	            <div class="text-center">
	              <button type="submit" class="btn btn-main text-center">Sign In</button>
	            </div>
	          </form>
	          <p class="mt-20">Already hava an account ?<a href="{{ url('login') }}"> Login</a></p>
	          <p><a href="{{ url('forgot-passsword') }}"> Forgot your password?</a></p>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
@stop