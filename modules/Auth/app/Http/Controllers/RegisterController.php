<?php

namespace Modules\Auth\Http\Controllers;

use AllowDynamicProperties;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\Users\RegisterUserServiceInterface;

#[AllowDynamicProperties] class RegisterController extends Controller
{
    public function __construct(RegisterUserServiceInterface $registerService)
    {
        $this->registerService = $registerService;
    }

    /**
     * Register a new account.
     *
     * @unauthenticated
     */
    public function handle(RegisterRequest $registerRequest)
    {
        $form = $registerRequest->validated();

        return new UserResource($this->registerService->register(
            $form['name'],
            $form['email'],
            $form['password'],
        ));
    }
}
