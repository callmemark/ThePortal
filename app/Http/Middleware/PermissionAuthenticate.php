<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissionAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * @param integer role
     */
    public function handle(Request $request, Closure $next)
    {   
        if(auth()-> guard('admin') ->user()){
            return $next($request);
        }
        
        return redirect(route('dashboard'));
    }
}
