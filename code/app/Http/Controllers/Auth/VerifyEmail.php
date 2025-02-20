<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Support\Facades\RateLimiter;
use Inertia\Inertia;

class VerifyEmail extends Controller
{
    public function sendEmail(Request $request){
        if(empty($request->user())){
            throw ErrorException('User not logged in');
        }
        if(empty($request->user()->email)){
            throw ErrorException('Email empty.');
        }

        $key = 'email_verify_user_'.$request->user()->id;
        RateLimiter::hit($key);
        if(!RateLimiter::tooManyAttempts($key,$perHour = 3)){
            $request->user()->sendEmailVerificationNotification();
        }
        $request->session()->flash('success',__('auth.email_notification',['email' => $request->user()->email]));    
        return Inertia::render('Auth/VerifyEmail');
    }
}
