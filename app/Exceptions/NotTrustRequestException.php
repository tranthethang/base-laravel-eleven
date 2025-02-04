<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class NotTrustRequestException extends Exception
{
    public function __construct(
        ?string $message = null,
        int $code = Response::HTTP_BAD_REQUEST,
        ?Throwable $previous = null
    ) {
        parent::__construct($message ?? __('exception.request_is_invalid'), $code, $previous);
    }
}
