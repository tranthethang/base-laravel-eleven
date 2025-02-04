<?php

namespace App\Services\Users;

use App\Exceptions\CannotRegisterUserException;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class RegisterService implements RegisterServiceInterface
{
    /**
     * @throws CannotRegisterUserException
     */
    public function register($name, $email, $password): User
    {
        try {
            return User::create([
                'name'     => $name,
                'email'    => $email,
                'password' => bcrypt($password),
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new CannotRegisterUserException;
        }
    }
}
