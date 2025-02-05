<?php

namespace Modules\Auth\App\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OAuthLoginPassword
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, string $type = 'password'): Response
    {
        $request->merge([
            'grant_type'    => $type,
            'client_id'     => config('module_auth.password.client_id'),
            'client_secret' => config('module_auth.password.client_secret'),
        ]);

        return $next($request);
    }
}
