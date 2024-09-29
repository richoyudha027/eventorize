<?php

use App\Http\Controllers\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [ApiAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [ApiAuthController::class, 'logout']);  
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
    Route::put('/user/{id}', [ApiAuthController::class, 'update']);
    Route::delete('/user/{id}', [ApiAuthController::class, 'delete']);  
    Route::post('/user', [ApiAuthController::class, 'create']);  
    Route::get('/users', [ApiAuthController::class, 'getAllUsers']);   
    Route::get('/user/{id}', [ApiAuthController::class, 'getUserById']);
});
