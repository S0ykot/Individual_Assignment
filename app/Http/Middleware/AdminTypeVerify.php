<?php

namespace App\Http\Middleware;

use Closure;

class TypeVerify
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
         if(!$req->session()->get('type')=='admin'){
            return viwe('error');
        }
        
        return $next($request);
    }
}
