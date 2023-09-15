@extends('layout')
@section('content')
<div class="products_wrapper">  
  <h3>Result</h3>
<div class="myproducts_inner_wrapper">
  @foreach($searchItems as $item)
  <div class="product_item">
    <div class="product_image_wrap"><a class="product-link" href="/product-deatil/{{$item->id}}"><img src="{{asset($item->gallery)}}"></div>
    <div class="product_desc">
      <h4 class="product_name">
        <a class="product-link" href="/product-deatil/{{$item->id}}">
          {{$item->name}}</a></h4>
      <p class="product_desc">{{$item->desc}}</p>
      <p class="product_category">{{$item->category}}</p>
      <p class="product_price">{{$item->price}}</p>
      </div>
    </div>
  @endforeach
</div>
  
    
</div>
@stop