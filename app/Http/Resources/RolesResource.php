<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RolesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'role' => $this->role,
            'school' => [
                'school_id' => $this->schools->id,
                'name' => $this->schools->name,
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        if ($request->routeIs('roles.show')) {
            return $data;
        }

        return $data;
    }
}