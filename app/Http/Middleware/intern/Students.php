<?php

namespace App\Http\Middleware\intern;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Students
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
        if(Auth::user()->role != 'student'){
            return redirect()->route('app.home')->with('message', 'not register as a student');
        }
        return $next($request);
    }
}
