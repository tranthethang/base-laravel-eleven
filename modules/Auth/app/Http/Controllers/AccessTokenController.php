<?php

namespace Modules\Auth\Http\Controllers;

use AllowDynamicProperties;
use App\Http\Requests\Api\TokenRequest;
use App\Http\Resources\TokenResource;

#[AllowDynamicProperties] class AccessTokenController extends TokenController
{
    /**
     * Verify account with email and password.
     *
     * @return TokenResource
     */
    public function handle(TokenRequest $request)
    {
        return $this->exec($request);
    }
}
