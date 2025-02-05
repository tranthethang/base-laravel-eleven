<?php

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AccessTokenController;
use Modules\Auth\Http\Controllers\ProfileController;
use Modules\Auth\Http\Controllers\RefreshTokenController;
use Modules\Auth\Http\Controllers\RegisterController;

Route::prefix('auth')->group(function () {
    Route::post('/token', [AccessTokenController::class, 'handle'])
        ->name('token.access')
        ->middleware(['oauth2:password']);

    Route::post('/token/refresh', [RefreshTokenController::class, 'handle'])
        ->name('token.refresh')
        ->middleware(['oauth2:refresh_token']);

    Route::post('/users', [RegisterController::class, 'handle'])->name('users.register');

    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('/users', [ProfileController::class, 'handle'])->name('users.profile');
    });
});
