<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if (session ()->has ("cart")){
           if (count(session("cart")) == 0) {
               return redirect("/cart");
           }
       }else{
           return redirect("/cart");
       }
        return $next($request);
    }
}
