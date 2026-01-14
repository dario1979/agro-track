<?php

namespace Domain\CropCycle\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CropStageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'date' => $this->date,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
        ];
    }
}
