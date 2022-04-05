<?php

namespace App\Http\Middleware\intern;

use Closure;
use Illuminate\Http\Request;

class CompletedProfile
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

        if(auth()->user()->profile){
            return $next($request);
        }else{
            if(auth()->user()->corporate){
                return redirect()->route('company.internship')
                ->with([
                    'message'    =>'Dear user please complete your profile to post new internship',
                    'alert-type' => 'alert-danger',
                ]);;
            }
        }
        
      
    }
}
