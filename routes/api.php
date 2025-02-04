<?php

use App\Http\Controllers\Api\Auth\AccessTokenController;
use App\Http\Controllers\Api\Auth\RefreshTokenController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/oauth/token', [AccessTokenController::class, 'handle'])
    ->name('token.access')
    ->middleware(['oauth2:password']);

Route::post('/oauth/token/refresh', [RefreshTokenController::class, 'handle'])
    ->name('token.refresh')
    ->middleware(['oauth2:refresh_token']);

Route::post('/users', [RegisterController::class, 'handle'])->name('users.register');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/users', [ProfileController::class, 'handle'])->name('users.profile');
});
