<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'cr_number' => $this->cr_number,
            'cr_image' => $this->cr_image ? url('storage/' . $this->cr_image) : null,
            // Add other User fields as needed
        ];
    }
}
