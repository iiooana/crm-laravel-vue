<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
        
        if(empty($request->user())){
           return redirect()->route('login');
        }else if(empty($request->user()->email_verified_at)){
            return redirect()->route('verification.send');
        }
        return $next($request);
    }
}
