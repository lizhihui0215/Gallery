@extends('master')

@section('content')
  <div class="jumbotron col-sm-6 col-sm-push-3" style="margin-top: 5em">
    <h1>Login</h1>
    <form class="form" action="{{ url( 'user/do-login' ) }}" method="post">
      <div class="form-group">
        <input class="form-control" id="email" type="text" name="email" placeholder="Enter your email address" value="">
      </div>

      <div class="form-group">
        <input class="form-control" id="password" type="password" name="password" placeholder="Enter your secret password" value="">
      </div>

      <div class="form-group">
        <input class="btn btn-primary" id="login-btn" type="submit" name="login" value="Login">
      </div>

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
  </div>
  <div class="">
      <a href="/">Download App</a>
  </div>
@endsection
