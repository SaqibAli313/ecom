@extends('layout')
@section('content')
<div class="add_product_wrapper signup_wrapper">
<form class="add_product_form add_user_form" method="POST" action="/myproducts" enctype="multipart/form-data">
<h1 class="signup_wrap_heading">Add Product</h1>
	@csrf
	<div class="input_wrap">
		<input type="text" name="productname" placeholder="Enter Your Product Name">
		<input type="hidden" name="productownerid" value="{{$id->id}}">
	</div>
	<div class="input_wrap">
		<input type="text" name="productdesc" placeholder="Enter Your Description">
	</div>
	<div class="input_wrap">
		<input type="text" name="productcat" placeholder="Enter Your Category">
	</div>
	<div class="input_wrap">
		<input type="text" name="productprice" placeholder="Enter Your Price">
	</div>
	<div class="input_wrap">
		<input type="file" name="productimage">
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