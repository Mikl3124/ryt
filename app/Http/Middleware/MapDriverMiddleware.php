<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MapDriverMiddleware
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
        if(Auth::user()->role == 'driver' || Auth::user()->role == 'admin'){
            return $next($request);
        }else{
            return redirect('/')->with('status', 'Vous n\'êtes pas autorisé à consulter cette page !');
        }
    }
}
