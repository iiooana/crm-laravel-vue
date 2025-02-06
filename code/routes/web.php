<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get("/", function () {
    sleep(3);
    return Inertia::render('Dashboard');
});
Route::get('/about', function(){
    return Inertia::render('About');
});

//TODO: login page
//TODO: forgot password
//TODO: dashboard page

require __DIR__ . '/auth.php';
;
