<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class LoginCheck
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
        $userid=$request->session()->get('userid');
        if($userid){
            View::share('userid',$userid);
        }
        
        return $next($request);
    }
    
}
