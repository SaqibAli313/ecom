<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades;
use DB;

class ProductCotroller extends Controller
{
    function showPost(){
        $id = auth()->user();
        $products =  Product::where('user_id', $id['id'])->get();
        return view("myproducts", compact('products'));
    }
    function saveProduct(Request $req){
        $imageName = time().'.'.$req->productimage->extension();
        $req->productimage->move('images', $imageName);
        $data = new Product;
        $data->insert([
            'name' => $req->productname,
            'price' => $req->productprice,
            'category' => $req->productcat,
            'desc' => $req->productdesc,
            'gallery' => 'images/'.$imageName,
            'user_id' => $req->productownerid,
        ]);
        return redirect('/myproducts');
    }
    function editPost(Request $req, $id){
        $selectedProduct = Product::find($id);
        $userId = auth()->user();
        if ($selectedProduct->user_id == $userId['id']) {
            return view('editproduct', compact('selectedProduct'));
        }else{
            return redirect('/');
        }
        
    }
    function saveEditPost(Request $req){
        $newpostimage = $req->productimage;
        if ($req->hasFile('productimage')) {
            unlink($req->productoldimage);
            $imageName = time().'.'.$newpostimage->extension();
            $req->productimage->move('images', $imageName);
            $updatedImg = 'images/'.$imageName;
        }else{
            $updatedImg = $oldpostimage;
        }
        $postId = $req->productid;
        Product::Where('id', $postId)->update([
            'name' => $req->productname,
            'price' => $req->productprice,
            'category' => $req->productcat,
            'desc' => $req->productdesc,
            'gallery'  => $updatedImg
        ]);
        return redirect('/myproducts');
    }
    function deletePost(Request $req, $id){
        $data = Product::find($id);
        $userId = auth()->user();
        if ($data->user_id == $userId['id']) {
            unlink($data->gallery);
            $data->delete();
            return redirect('/myproducts');
        }else{
            return redirect('/');
        }
    }
    function search(Request $req){
        $searchItems = Product::Where('name', 'LIKE', '%'.$req->search."%")->get();
        return view('search', compact('searchItems'));
    }
    function productDetail($id){
        $product = Product::find($id);
        return view('product-detail', compact('product'));
    }
    function AddToCart(Request $req){
        if (auth()->user()) {
            DB::table('cart')->insert([
                "product_id" => $req->cartProductId,
                "user_id" => auth()->id(),
            ]);
            return redirect("/product-deatil/{$req->cartProductId}");
        }else{
            return redirect('/login');
        }
    }
    static function cartProducts(){
        $userId = auth()->id();
        $cartProductscount = Cart::where('user_id', $userId)->count();
        return $cartProductscount;
    }
    function cartItems(){
        $userid = auth()->id();
        $cartproducts = Cart::join('products', 'cart.product_id', 'products.id')
        ->where('cart.user_id', $userid)
        ->select('products.*', 'cart.id as cart_id')
        ->get();
        return view("cart", compact('cartproducts', 'userid'));
    }
    function removeCartItem($id){
        Cart::destroy($id);
        return redirect('/cart');
    }
    function removeAllCartItems($userid){
        Cart::Where('user_id', $userid)->delete();
        return redirect('/cart');
    }
}
