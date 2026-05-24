<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

// Route Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});

// Route articles yang sudah ada
Route::resource('articles', App\Http\Controllers\ArticleController::class);