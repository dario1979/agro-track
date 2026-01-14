<?php

namespace Domain\CropCycle\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CropCycle extends Model
{
    protected $fillable = [
        'user_id',
        'crop_type',
        'location',
        'sowing_date',
        'estimated_harvest_date',
        'status',
    ];

    public function stages(): HasMany
    {
        return $this->hasMany(CropStage::class);
    }
}
