<?php

namespace App\Http\Controllers\Api\Auth;

use AllowDynamicProperties;
use App\Http\Resources\TokenResource;
use Illuminate\Foundation\Http\FormRequest;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Nyholm\Psr7\ServerRequest;

#[AllowDynamicProperties] abstract class TokenController extends AccessTokenController
{
    public function exec(FormRequest $request)
    {
        $serverRequest = new ServerRequest(
            $request->method(),                  // HTTP method
            $request->url(),                     // URL
            $request->headers->all(),            // Headers
            $request->getContent(),              // Body content
            '1.1',                        // Protocol version
            $request->server->all(),             // Server parameters
        );

        $serverRequest = $serverRequest
            ->withQueryParams($request->query())
            ->withParsedBody($request->all())
            ->withCookieParams($request->cookies->all())
            ->withUploadedFiles($request->files->all());

        $data = $this->issueToken($serverRequest);

        return new TokenResource(json_decode($data->getContent(), true));
    }
}
