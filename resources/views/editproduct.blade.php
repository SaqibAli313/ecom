@extends('layout')
@section('content')
<div class="add_product_wrapper signup_wrapper">
<form class="add_product_form add_user_form" method="POST" action="/editmyproduct" enctype="multipart/form-data">
<h1 class="signup_wrap_heading">Add Product</h1>
	@csrf
	<div class="input_wrap">
		<input type="text" name="productname" placeholder="Enter Your Product Name" value="{{$selectedProduct['name']}}">
		<input type="hidden" name="productid" value="{{$selectedProduct['id']}}">
	</div>
	<div class="input_wrap">
		<input type="text" name="productdesc" placeholder="Enter Your Description" value="{{$selectedProduct['desc']}}">
	</div>
	<div class="input_wrap">
		<input type="text" name="productcat" placeholder="Enter Your Category" value="{{$selectedProduct['category']}}">
	</div>
	<div class="input_wrap">
		<input type="text" name="productprice" placeholder="Enter Your Price" value="{{$selectedProduct['price']}}">
	</div>
	<div class="input_wrap">
		<div class="old-product-image">
			<img src="{{asset($selectedProduct['gallery'])}}">
			<span>Your product Image</span>
		</div>
		<input type="hidden" name="productoldimage"  value="{{$selectedProduct['gallery']}}">
		<p style="text-align:left;margin:20px 0px 0px;color:#fff;">Update Image</p>
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