<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'company_name' => $this->company_name,
            'position' => $this->position,
            'location' => $this->location,
            'salary' => $this->salary,
            'description' => $this->description,
            'application_url' => $this->application_url,
            'job_type' => new JobTypeResource($this->whenLoaded('jobType')),
            'application_status' => new ApplicationStatusResource($this->whenLoaded('applicationStatus')),
        ];
    }
}
