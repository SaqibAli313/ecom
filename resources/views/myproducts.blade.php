@extends('layout')
@section('content')
<div class="my_products_wrapper">
  <div class="user_menu">
    <a class="add-product" href="/add-product">Add Product</a>
</div>
<div class="my_products_inner_wrapper">
  
  @if($products->count() != 0)
  <h3>My Products</h3>
  <table class="my_products">
    <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Category</th>
      <th>Price</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
  @foreach($products as $item)
  <tr>
    <td>
    <div class="my_product_image_wrap">
      <a class="product-link" href="/product-deatil/{{$item->id}}">
        <img src="{{asset($item->gallery)}}"></a>
    <a class="product-link" href="/product-deatil/{{$item->id}}">{{$item['name']}}</a></div>
    </td>
    <td><p class="my_product_desc">{{$item->desc}}</p></td>
    <td><p class="my_product_category">{{$item->category}}</p></td>
    <td><p class="my_product_price">{{$item->price}}</p></td>
    <td><a class="product-action edit" href="/edit-product/{{$item->id}}">Edit</a><a  class="product-action delete" href="/delete-product/{{$item->id}}">Delete</a></td></tr>
  @endforeach
</tbody>
</table>
@else
<h3>No record Found</h3>
  @endif
</div>
</div>
@stop