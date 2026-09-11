<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'email'          => $this->email,
            'logo'           => $this->logo_url,
            'website'        => $this->website,
            'employee_count' => (int) ($this->employees_count ?? $this->employees()->count()),
            'employees'      => EmployeeResource::collection($this->whenLoaded('employees')),
            'created_at'     => $this->created_at?->toISOString(),
            'updated_at'     => $this->updated_at?->toISOString(),
        ];
    }
}