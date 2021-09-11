<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Closure;
use Illuminate\Http\Request;

class AdminAuth
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
        if($user=Sentinel::check())
        {
            if($user->type == 'admin'){
            return $next($request);
            }
        }

        abort(404);
    }
}
