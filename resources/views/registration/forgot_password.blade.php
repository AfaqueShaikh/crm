@extends('layouts.default')

@section('content')
	<section class="forget-password-page account">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-6 col-md-offset-3">
	        <div class="block text-center">
	          @include('partials._messages')
	          <a class="logo" href="index.html">
	            <img src="images/logo.png" alt="">
	          </a>
	          <h2 class="text-center">Welcome Back</h2>
	          <form class="text-left clearfix" method="post" action="{{ url('forgot-passsword') }}">
	          	{{ csrf_field() }}
	            <p>Please enter the email address for your account. A verification code will be sent to you. Once you have received the verification code, you will be able to choose a new password for your account.</p>
	            <div class="form-group">
	              <input type="email" class="form-control" name="email" placeholder="Account email address">
	            </div>
	            <div class="text-center">
	              <button type="submit" class="btn btn-main text-center">Request password reset</button>
	            </div>
	          </form>
	          <p class="mt-20"><a href="{{ url('login') }}">Back to log in</a></p>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
@stop