<?php

namespace App\Http\Middleware;

use Closure;

use Session;

class IsActive
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

        // if(session('role_permissions')==null){
        //     $role_permissions = [];
        // }

        // Session::put('role_permissions', $role_permissions);
        return $next($request);
    }
}
