<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if(empty($user)){//Pas connecté
            return redirect('backoffice/login');
        }else{
            if(!$user->admin){//If not admin
                return redirect('/');
            }
        }

        return $next($request);
    }
}
