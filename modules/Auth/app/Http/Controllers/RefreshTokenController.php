<?php

namespace Modules\Auth\Http\Controllers;

use AllowDynamicProperties;
use App\Http\Requests\Api\RefreshTokenRequest;
use App\Http\Resources\TokenResource;

#[AllowDynamicProperties] class RefreshTokenController extends TokenController
{
    /**
     * Request a new access_token using the refresh_token.
     *
     * @return TokenResource
     */
    public function handle(RefreshTokenRequest $request)
    {
        return $this->exec($request);
    }
}
