<?php

use App\Jobs\ResetEmailVerify;
use Illuminate\Support\Facades\Schedule;


Schedule::call(function () {
    dispatch(new ResetEmailVerify);
})->daily()
    ->name('email.reset.verify')
    ->onOneServer();
   // ->runInBackground(); TODO: config multi server
