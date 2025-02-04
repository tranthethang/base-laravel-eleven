<?php

namespace App\Http\Middleware;

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
            'client_id'     => config('oauth.password.client_id'),
            'client_secret' => config('oauth.password.client_secret'),
        ]);

        return $next($request);
    }
}
