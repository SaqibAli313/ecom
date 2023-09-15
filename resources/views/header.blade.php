<?php
use App\Http\Controllers\ProductCotroller;
$total = ProductCotroller::cartProducts();
?>
<header class="header">
  <div class="logo">
    <a href="/"><img src="{{asset('images/logo.png') }}"></a>
  </div>
  @if (Auth::check())
  <div class="search_form-wrap">
    <form action="/search" method="POST">
      @csrf
      <input type="text" name="search" placeholder="Search Products">
      <input class="btn btn-primary" type="submit" value="Search">
    </form>
  </div>
			 <div class="navbar">
  <div class="navbar_inner_wrap">
    <ul class="navbar">
      <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/myproducts">My products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/cart">Cart</a>
        <span class="cart_products_count">{{$total}}</span>
      </li>
      <li class="nav-item">
        <a class="nav-link logout" href="/logout">Logout</a>
      </li>
    </ul>
  </div> 
</div>
@else
<div class="navbar">
  <div class="navbar_inner_wrap">
    <ul class="navbar">
      <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/signup">Register</a>
      </li>
      </ul>
  </div>
</div>
@endif
</header>