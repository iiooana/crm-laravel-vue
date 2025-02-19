<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\RateLimiter;

class RequestRateLimiter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
     
        //Rate limit for user
        if(!empty($request->user())){
            $key = "request_user_".$request->user()->id;
            RateLimiter::hit($key);
            if(RateLimiter::tooManyAttempts($key,$perMinute = 60)){
                return response('Too many requests.',429);
            }
        }else{
            //Rate limit for IP
            $key = "request_ip_" . $request->ip();
            RateLimiter::hit($key);//the key will be saved on cache system    
            if (RateLimiter::tooManyAttempts($key, $perMinute = 80)) {
                return response('Too many requests.',429);
            }
        }

        return $next($request);
    }
}
