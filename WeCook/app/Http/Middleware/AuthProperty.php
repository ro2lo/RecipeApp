<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AuthProperty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
            if(Auth::check()){
                if($request->id != Auth::user()->id){
                    return redirect()->back();
                }
            }else{
                return redirect('/home');
            }


        return $next($request);
    }
}
