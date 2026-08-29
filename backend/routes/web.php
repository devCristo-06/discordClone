<?php

use App\Http\Controllers\api\v1\ServerController;
use Illuminate\Support\Facades\Route;

// WELCOME PAGE

Route::get('/', function () {
    return view('welcome');
});


// Basics

Route::prefix('api/v1')->group(function () {

    Route::get('/servers', [ServerController::class, 'index']);
    Route::get('/servers/{server}', [ServerController::class, 'show']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/servers', [ServerController::class, 'store']);
        Route::put('/servers/{server}', [ServerController::class, 'update']);
        Route::delete('/servers/{server}', [ServerController::class, 'destroy']);
    });
});
