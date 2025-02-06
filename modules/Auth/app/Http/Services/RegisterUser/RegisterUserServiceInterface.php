<?php

namespace Modules\Service\RegisterUser;

use App\Models\User;

interface RegisterUserServiceInterface
{
    public function register($name, $email, $password): User;
}
