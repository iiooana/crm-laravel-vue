<?php

use App\Jobs\ResetEmailVerify;
use Illuminate\Support\Facades\Schedule;


Schedule::call(function () {
    dispatch(new ResetEmailVerify);
})->daily()
    ->name('email.reset.verify')
    ->onOneServer();
   // ->runInBackground(); TODO: config multi server
   
//test
   Schedule::call(function () {
    dispatch(new ResetEmailVerify);
})->everyMinute()
    ->name('email.reset.verify')
    ->onOneServer();

sleep(1);//for supervisor