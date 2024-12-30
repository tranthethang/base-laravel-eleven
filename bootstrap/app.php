<?php

use App\Http\Middleware\OAuthLoginPassword;
use App\Http\Middleware\TrustRequestMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )->withRouting(
        api: __DIR__.'/../routes/api.php',
        apiPrefix: 'api/',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'oauth2' => OAuthLoginPassword::class,
        ]);

        $middleware->api(prepend: [
            TrustRequestMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
