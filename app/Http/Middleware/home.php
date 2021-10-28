<?php

namespace App\Http\Middleware;

use Closure;

class home
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
                if (\Auth::user()->isAdmin == true) {
                    return redirect()->route('admin.dashboard');
                }
                if ((int)\Auth::user()->role == 3 && \Auth::user()->isAdmin == false) {
                    return redirect()->route('deliveryman.index');

                }
                if ((int)\Auth::user()->role == 2 && \Auth::user()->isAdmin == false) {
                    return redirect()->route('shopowner.index');

                }
                return $next($request);

        
    }
        
}
