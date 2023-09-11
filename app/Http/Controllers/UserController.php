<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\user;

class UserController extends Controller
{
    function save_user(Request $req){
        $req->validate([
            'first_name'=> 'required | min: 3 | max: 15',
            'last_name'=> 'required | min: 3 | max: 15',
            'email'=> 'required | min: 13 | max:30',
            'password'=> 'required | min:8 | max:15'
            
        ]);
        $data = new user;
        $data->first_name = $req->first_name;
        $data->last_name = $req->last_name;
        $data->user_email = $req->email;
        $data->user_password = $req->password;
        $data->save();
        return redirect('login');
    }

    function login(Request $req){
        $req->validate([
            'email'=> 'required | min: 13 | max:30',
            'password'=> 'required | min:8 | max:15'
            
        ]);
        $image = user::firstwhere('user_email',$req->email);
        $firstName = $image->first_name;
        $lastName = $image->last_name;
        $profile = $image->profile_pic;
        $count_email = user::where ('user_email', $req->email)->count();
        $count_password = user::where ('user_password', $req->password)->count();
        if($count_email == 1 && $count_password == 1){
            $req->session()->put('data', $req->email);
            $req->session()->put('first_name', $firstName);
            $req->session()->put('last_name', $lastName);
            return redirect('profile');
        }
        
    }

    function uploadProfile(Request $req){
        $req->validate([
            'profile'=> 'required|image|mimes:jpeg,jpg,png'
        ]);
        $image_name = time().".".$req->profile->extension();
        $req->profile->move("images", $image_name);
        $email = $req->email;
        $image = user::firstwhere('user_email', $email);
        $image::find('id');
        $image->profile_pic = $image_name;
        $image->save();
        $req->session()->put('profile', $image->profile_pic);
        return redirect("profile");
    }

    function logout(){
        if (Session()->has('data')) {
            session()->pull('data');
        };
        return redirect('login');
    }
}
