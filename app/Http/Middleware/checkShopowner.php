<?php

namespace App\Http\Middleware;

use Closure;

class checkShopowner
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
                if ((int)\Auth::user()->role !== 2) {
                    return redirect()->route('home');

                }
                return $next($request);

        
    }
        
}
