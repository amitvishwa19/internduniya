<?php

namespace App\Http\Middleware\intern;

use Closure;
use Illuminate\Http\Request;

class Subscribed
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
    
        if(auth()->User()->subscribed && auth()->User()->action_count > 0){
            return $next($request);
        }else{
            if(auth()->User()->role == 'student'){
                return redirect()->back()
                ->with([
                    'subscribe-message'    =>'Dear candidate you do not have any credit to apply intenship, check for our Plans',
                    'alert-type' => 'alert-danger',
                ]);
            }else{
                return redirect()->back()
                ->with([
                    'subscribe-message'    =>'Dear Corporate you do not have any credit to post intenship, check for our Plans',
                    'alert-type' => 'alert-danger',
                ]);
            }
            
        }
      
        
    }
}
