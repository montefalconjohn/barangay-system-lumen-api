<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => [
                'type' => 'users',
                'id' => (string)$this->id,
                'attributes' => [
                    'name' => $this->name,
                    'email' => $this->email
                ],
            ],
        ];
    }
}
