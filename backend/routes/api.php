<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\HomeController;
use App\Http\Controllers\api\v1\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ESEMPIO DI LARAVEL

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// TEST API
// Route::get('/example', [ServerController::class, 'test']);

if (!defined('_VERS')) {
    define('_VERS', 'v1');
}

// AUTH APIs
Route::post(_VERS, '/register', [AuthController::class, 'register']);
Route::post(_VERS, '/login', [AuthController::class, 'login']);

// OAuth2 per chi accede da Google
Route::get(_VERS, '/auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get(_VERS, '/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);


// PAGINE PRINCIPALI DISCORD
Route::middleware('auth:api')->group(function () {
    Route::get(_VERS, '/home', [HomeController::class, 'home']);
    Route::get(_VERS, '/profile', [SettingController::class, 'profile']);
});
