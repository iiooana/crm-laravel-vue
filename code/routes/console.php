<?php

use App\Jobs\PingWebsitesJob;
use App\Jobs\ResetEmailVerify;
use Illuminate\Support\Facades\Schedule;

/*
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
*/

Schedule::call(function (){
    dispatch(new PingWebsitesJob);
})->everyMinute()->name('websites.ping')->onOneServer();


