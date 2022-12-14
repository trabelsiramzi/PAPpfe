<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class TeamleadAuthMiddleware
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

        if(Session::has('userId') && Session::has('userName') && Session::has('userType')=='teamlead')
        {
            return $next($request);
        }
        else
        {
            return redirect('/login/user');
        }
    }
}
