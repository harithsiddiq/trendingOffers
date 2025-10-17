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
            'tiktok_url' => $this->tiktok_url,
            'instagram_url' => $this->instagram_url,
            'whatsapp_url' => $this->whatsapp_url,
            'x_url' => $this->x_url,
            // Add other User fields as needed
        ];
    }
}
