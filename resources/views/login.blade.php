@extends('layout')
@section('content')
<div class="signup_wrapper login_wrapper">
<form class="add_user_form signin_form" method="POST" action="/login">
<h1 class="signup_wrap_heading">Login</h1>
	@csrf
	<div class="input_wrap">
		<input type="email" name="email" placeholder="Enter Your Email">
	</div>
	<div class="input_wrap">
		<input type="password" name="password" placeholder="Enter Your Password">
	</div>
	<div class="input_wrap">
		<input type="submit" name="submit" value="Login">
	</div>
</form>
</div>
@if($errors->any())
<ul class="form_errors">
@foreach($errors->all() as $error)
<li>{{$error}}</li> 
@endforeach
</ul>
@endif
@stop