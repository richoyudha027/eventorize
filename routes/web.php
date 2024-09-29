<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [SessionController::class, 'index']);

Route::middleware(['guest'])->group(function() {
    Route::get('/login', [SessionController::class, 'index'])->name('login');  
    Route::post('/login', [SessionController::class, 'login']); 
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/crud-event', EventController::class);

    Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
});

Route::fallback(function () {
    return view('fallback');
});

