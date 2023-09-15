@extends('layout')
@section('content')
<div class="cart_wrappper order-now-wrapper">
	@if($cartproducts->count() != 0)
	<div class="cart-head order-now-head">
<h3>Cart Items</h3>
</div>
<div class="cart_innerwrappper order-now-innerwrappper">
<table>
	<thead>
		<tr>
			<th>Product Name</th>
			<th>Price</th>
			<th>Description</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($cartproducts as $item)
		<tr>
			<td>
				<div class="cart_product_img"><img src="{{asset($item->gallery)}}">{{$item->name}}</div>
			</td>
			<td>{{$item->price}}</td>
			<td>{{$item->desc}}</td>
			<td><a class="btn btn-danger" href="/cart-item-remove/{{$item->cart_id}}">Remove</a></td>
	    </tr>
		@endforeach
	</tbody>
</table>
<div class="order-btn">
<a class="btn btn-success" href="/order-now">Order Now</a>
</div>
</div>
@else
<h3>No record Found</h3>
@endif
</div>
@stop