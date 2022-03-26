<?php

namespace App\Http\Middleware\intern;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Company
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
        if(Auth::user()->role != 'company'){
            return redirect()->route('app.home')->with('message', 'not register as a company');
        }
        return $next($request);
    }
}
