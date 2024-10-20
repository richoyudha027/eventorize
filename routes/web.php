<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [SessionController::class, 'index']);
Route::get('/register', function(){
    return view('auth.register');
})->name('register');

Route::get('/profile', function(){
    return view('profile');
})->name('profile');

Route::middleware(['guest'])->group(function() {
    Route::get('/login', [SessionController::class, 'index'])->name('login');  
    Route::post('/login', [SessionController::class, 'login']); 
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/crud-event', EventController::class);
    Route::resource('/bookings', BookingController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/organizers', OrganizerController::class);

    Route::get('/bookings/create/{id}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings/{id}', [BookingController::class, 'store'])->name('bookings.store');
    Route::post('/bookings/{id}/verify', [BookingController::class, 'verify'])->name('bookings.verify');

    Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
});

Route::fallback(function () {
    return view('fallback');
});

