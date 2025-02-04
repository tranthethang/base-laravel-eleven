<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class CannotRegisterUserException extends Exception
{
    public function __construct(
        ?string $message = null,
        int $code = Response::HTTP_INTERNAL_SERVER_ERROR,
        ?Throwable $previous = null
    ) {
        parent::__construct($message ?? __('exception.cannot_register_user_exception'), $code, $previous);
    }
}
