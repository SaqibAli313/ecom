<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductCotroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>'web'], function(){
    Route::get('/', [UserController::class, 'index']);
    // Route::get('add-product', ProductCotroller::class, addProduct);
    Route::get('add-product', [UserController::class, 'getUserid']);
    Route::post('/myproducts', [ProductCotroller::class, 'saveProduct']);
    Route::get('myproducts', [ProductCotroller::class, 'showPost']);
    Route::get('/edit-product/{id}', [ProductCotroller::class, 'editPost']);
    Route::post('/editmyproduct', [ProductCotroller::class, 'saveEditPost']);
    Route::get('/delete-product/{id}', [ProductCotroller::class, 'deletePost']);
    Route::get('/product-deatil/{id}', [ProductCotroller::class, 'productDetail']);
    Route::post('addtocart', [ProductCotroller::class, 'AddToCart']);
    Route::get("/cart", [ProductCotroller::class, 'cartItems']);
    Route::get('/cart-item-remove/{id}', [ProductCotroller::class, 'removeCartItem']);
    Route::get('/remove-all/{userid}', [ProductCotroller::class, 'removeAllCartItems']);
    Route::post('/search', [ProductCotroller::class, 'Search']);
    });
Route::get('login', function(){
    return view('login');
});
Route::get('signup', function(){
    return view('signup');
});
Route::post('/login', [UserController::class, 'login']);
Route::post('/signup', [UserController::class, 'signup']);
Route::get("/logout",[UserController::class, 'logout']);