<?php

use App\Http\Controllers\Api\Auth\AccessTokenController;
use App\Http\Controllers\Api\Auth\RefreshTokenController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/oauth/token', [AccessTokenController::class, 'issueToken'])->name('token.access');

Route::post('/oauth/token/refresh', [RefreshTokenController::class, 'refresh'])->name('token.refresh');

Route::post('/users', [RegisterController::class, 'handle'])->name('users.register');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/users', [ProfileController::class, 'handle'])->name('users.profile');
});
