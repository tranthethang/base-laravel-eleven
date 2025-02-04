<?php

namespace App\Http\Controllers\Api\Auth;

use AllowDynamicProperties;
use App\Http\Requests\Api\TokenRequest;
use App\Http\Resources\TokenResource;

#[AllowDynamicProperties] class AccessTokenController extends TokenController
{
    /**
     * Authorize a client to access the user's account by email and password.
     *
     * @return TokenResource
     */
    public function handle(TokenRequest $request)
    {
        return $this->exec($request);
    }
}
