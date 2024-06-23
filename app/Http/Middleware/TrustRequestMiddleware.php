<?php

namespace App\Http\Middleware;

use App\Exceptions\NotTrustRequestException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrustRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     *
     * @throws NotTrustRequestException
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header(config('X-Api-Key'));

        if ($apiKey !== config('constant.api_key')) {
            throw new NotTrustRequestException();
        }

        return $next($request);
    }
}
