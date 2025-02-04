<?php

namespace App\Http\Controllers\Api;

use AllowDynamicProperties;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

#[AllowDynamicProperties] class ProfileController extends Controller
{
    /**
     * Get the currently logged-in user information.
     *
     * @return UserResource
     */
    public function handle()
    {
        $user = User::query()->findOrFail(auth()->id());

        return new UserResource($user);
    }
}
