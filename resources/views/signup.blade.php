@extends('layout')
@section('content')
<div class="signup_wrapper">
<form class="add_user_form" action="/signup" method="POST">
<h1 class="signup_wrap_heading">Join Us</h1>
	@csrf
	<div class="input_wrap">
		<input type="text" name="name" placeholder="Enter Your Name">
	</div>
	<div class="input_wrap">
		<input type="email" name="email" placeholder="Enter Your Email">
	</div>
	<div class="input_wrap">
		<input type="password" name="password" placeholder="Enter Your Password">
	</div>
	<div class="input_wrap">
		<input type="submit" name="register" value="Register">
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