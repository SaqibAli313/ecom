<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $path = $request->path();
        if($path == "login" && Auth::user()){
            return redirect("/");
        }elseif($path == "/" && !Auth::user()){
            return redirect("login");
        }
        elseif($path == "myproducts" && !Auth::user()){
            return redirect("login");
        }
        elseif($path == "add-product" && !Auth::user()){
            return redirect("login");
        }
        elseif($path == "/edit-product/{id}" && !Auth::user()){
            return redirect("login");
        }
        elseif($path == "/editmyproduct" && !Auth::user()){
            return redirect("login");
        }elseif($path == "/delete-product/{id}"  && !Auth::user()){
            return redirect("login");
        }

        return $next($request);
    }
}
