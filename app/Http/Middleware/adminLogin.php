<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(($request->session()->get('user')==null)){
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
