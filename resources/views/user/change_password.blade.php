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
              <h2 class="text-center">Change Password</h2>
              <form class="text-left clearfix" method="post" action="{{ url('change-password') }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <input type="password" class="form-control" name="current_password" autocomplete="off" placeholder="Current Password">
                </div> 
                <div class="form-group">
                 <input type="password" class="form-control" name="password" placeholder="New Password" required>
                </div> 
                <div class="form-group">
                 <input type="password" class="form-control" name="password_confirmation" placeholder="Repeat Password" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-main text-center">Update Password</button>
                </div>
              </form>
              <p class="mt-20"><a href="{{ url('login') }}">Back to log in</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
