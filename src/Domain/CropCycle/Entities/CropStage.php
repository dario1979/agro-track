<?php
namespace Domain\CropCycle\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CropStage extends Model
{
    protected $fillable = [
        'crop_cycle_id',
        'name',
        'date',
        'notes',
    ];

    public function cycle(): BelongsTo
    {
        return $this->belongsTo(CropCycle::class);
    }
}
