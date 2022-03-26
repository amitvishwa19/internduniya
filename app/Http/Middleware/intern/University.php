<?php

namespace App\Http\Middleware\intern;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class University
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
        if(Auth::user()->role != 'university'){
            return redirect()->route('app.home')->with('message', 'not register as a university');
        }
        return $next($request);
    }
}
