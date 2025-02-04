<?php

namespace App\Http\Controllers\Api\Auth;

use AllowDynamicProperties;
use App\Http\Requests\Api\RefreshTokenRequest;
use App\Http\Resources\TokenResource;

#[AllowDynamicProperties] class RefreshTokenController extends TokenController
{
    /**
     * Authorize a client to access the user's account by refresh_token.
     *
     * @return TokenResource
     */
    public function handle(RefreshTokenRequest $request)
    {
        return $this->exec($request);
    }
}
