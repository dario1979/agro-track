<?php

namespace Domain\CropCycle\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CropCycleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'crop_type' => $this->crop_type,
            'location' => $this->location,
            'sowing_date' => $this->sowing_date,
            'estimated_harvest_date' => $this->estimated_harvest_date,
            'status' => $this->status,
            'stages' => $this->whenLoaded('stages'),
            'created_at' => $this->created_at,
        ];
    }
}
