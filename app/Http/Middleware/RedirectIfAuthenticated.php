<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if($request->session()->has('delivery_id')){
                $request->session()->forget('delivery_id');
                return redirect('/delivery/'.session('delivery_id').'/save');
            }
            return redirect('/teub');
        }


        return $next($request);
    }
}
