<?php

namespace App\Providers;

use App\Services\Users;
use Dedoc\Scramble\Scramble;
use Dedoc\Scramble\Support\Generator\OpenApi;
use Dedoc\Scramble\Support\Generator\SecurityScheme;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        Users\RegisterServiceInterface::class => Users\RegisterService::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        Passport::enablePasswordGrant();
        Passport::ignoreRoutes();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Scramble::afterOpenApiGenerated(function (OpenApi $openApi) {
            $openApi->secure(SecurityScheme::http('bearer'));
        });
    }
}
