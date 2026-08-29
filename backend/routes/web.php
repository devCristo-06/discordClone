<?php

use App\Http\Controllers\api\v1\ServerController;
use Illuminate\Support\Facades\Route;

// WELCOME PAGE

Route::get('/', function () {
    return view('welcome');
});


// Basics

Route::prefix('api/v1')->group(function () {

    // REGISTER AND LOGIN PAGES
    // Route::post('/register', [AuthController::class, 'register']);
    // Route::post('/login', [AuthController::class, 'login']);

    // TEST TO CHECK THE SERVERS
    Route::apiResource('servers', ServerController::class);
});
