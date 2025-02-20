<?php

use App\Jobs\ResetEmailVerify;
use Illuminate\Support\Facades\Schedule;


Schedule::call(function(){
    dispatch(new ResetEmailVerify);
})->everyMinute();