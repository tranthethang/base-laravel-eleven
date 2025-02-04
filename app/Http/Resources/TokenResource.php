<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'access_token'  => data_get($this, 'access_token'),
            'refresh_token' => data_get($this, 'refresh_token'),
            'token_type'    => data_get($this, 'token_type'),
            'expires_in'    => (int) data_get($this, 'expires_in'),
        ];
    }
}
