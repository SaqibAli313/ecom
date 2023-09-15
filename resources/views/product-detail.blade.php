@extends('layout')
@section('content')
<div class="product_detail_wrapper">
	<div class="product_detail_inner_wrapper">
		<h3>Product Detail</h3>
		<div class="product_detail_item">
			<div class="product_detail_image">
				<img src="{{asset($product->gallery)}}">
			</div>
			<div class="product_detail_desc">
				<a href="/">Go back</a>
				<h3>{{$product->name}}</h3>
				<h4>Price : {{$product->category}}</h4>
				<p>Details: {{$product->desc}}</p>
				<p>Category : {{$product->price}}</p>
				<div class="buy_btn">
					<form method="POST" action="/addtocart">
						@csrf
						<input type="hidden" name="cartProductId" value="{{$product->id}}">
						<input type="submit" class="btn btn-success" value="Add to Cart">
				</form>
					<button class="btn btn-primary">Buy Now</button>
				</div>
			</div>
		</div>
	</div>
</div>

@stop