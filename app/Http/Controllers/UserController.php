<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;

class UserController extends Controller
{
    function index(){
        $products = Product::all();
        return view('product',['user'=>auth()->user(), 'products'=>$products]);
    }
    function signup(Request $req){
        $data = new user;
        $data->name = $req->name;
        $data->email = $req->email;
        $data->password = Hash::make($req->password);
        $data->save();
        if(auth()->attempt(request()->only(['email', 'password']))) {
            return redirect("/");
        }
    }
    function login(){
        if(auth()->attempt(request(['email', 'password']))) {
            return redirect("/");
        }else{
            return redirect("/login");
        }
    }
    function getUserid(){
        $id = auth()->user();
        return view('add-product', ['id'=> $id]);
    }
    function logout(){
        auth()->logout();
        return redirect("/login");
    }
}
