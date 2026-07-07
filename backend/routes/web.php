<?php

use Illuminate\Support\Facades\Route;

// WELCOME PAGE

Route::get('/', function () {
    return view('welcome');
});


// Basics

// Route::prefix('v1')->group(function () {

//     Route::post('/register', [AuthController::class, 'register']);
//     Route::post('/login', [AuthController::class, 'login']);

// });
