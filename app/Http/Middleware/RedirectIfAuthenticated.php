<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if($guard === 'vendor'){
                    return redirect()->route(('vendor.login'));
                }
                if($guard === 'admin' ){
                    if(Auth::guard('admin')->user()->is_super === 1){
                       
                        return redirect()->route(('admin.Status.index'));
                    }
                    else
                    {
                         return redirect()->route(('admin.index'));
                    }
                }
                if($guard === 'delivery'){
                    return redirect()->route(('delivery.index'));
                }
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
