<?php
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Website\WebsiteController;

//TODO CHECK MIGRATIONS
//TODO CHCK CONTROLLERS
Route::middleware([AuthMiddleware::class])->group(function (){
    
    Route::get("/", function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::resource('customers',CustomerController::class);
    Route::resource('websites', WebsiteController::class);

});

require __DIR__ . '/auth.php'; 