<?php

namespace App\Http\Middleware;

use Closure;

class UserTypeVerify
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
        if(!$req->session()->get('type')=='user'){
            return viwe('error');
        }
        
        return $next($request);
    }
}
