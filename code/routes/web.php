<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get("/", function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::resource('customers',CustomerController::class);



require __DIR__ . '/auth.php';

