<?php

namespace Domain\CropCycle\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\CropCycle\Entities\CropStage;
use Domain\CropCycle\Entities\CropCycle;
use Domain\CropCycle\Http\Requests\StoreCropStageRequest;
use Domain\CropCycle\Http\Resources\CropStageResource;
use Illuminate\Support\Facades\Auth;

class CropStageController extends Controller
{
    public function store(StoreCropStageRequest $request, $cropCycleId)
    {
        $cycle = CropCycle::where('id', $cropCycleId)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();

        $stage = $cycle->stages()->create($request->validated());

        return new CropStageResource($stage);
    }

    public function index($cropCycleId)
    {
        $cycle = CropCycle::where('id', $cropCycleId)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();

        return CropStageResource::collection($cycle->stages);
    }
}
