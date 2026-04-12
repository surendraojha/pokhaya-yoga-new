<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerAuth
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
        if ($request->session()->has('User', 'user')) {
            return redirect('yoga_register');
        } else {
            $request->session()->flash('error', 'use login credentials');
            //return redirect('login');
        }
        return $next($request);
    }
}
