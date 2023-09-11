@extends('layout')
@section('content')
<div class="user_profile_wrapper">
	<div class="user_profile_inner_wrapper">
		<form method="POST" class="profile_pic_form" action="/upload_profile" enctype="multipart/form-data">
			@csrf
			<div class="input_wrap">
				<img src="{{asset('images/'.session('profile')) }}">
				<input type="file" name="profile">
				<input type="hidden" name="email" value="{{session('data')}}">
			</div>
			<div class="input_wrap">
				<input type="submit" value="Upload">
			</div>
		</form>
<h3>First Name: {{session('first_name')}}</h3>
<h3>Last Name: {{session('last_name')}}</h3>
<h3>Email: {{session('data')}}</h3>
<a href="/logout">logout</a>
</div>
</div>


@if($errors->any())
<ul class="form_errors">
@foreach($errors->all() as $error)
<li>{{$error}}</li> 
@endforeach
</ul>
@endif
@stop