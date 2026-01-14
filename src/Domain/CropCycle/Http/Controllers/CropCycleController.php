<?php

namespace Domain\CropCycle\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\CropCycle\Entities\CropCycle;
use Domain\CropCycle\Http\Requests\StoreCropCycleRequest;
use Domain\CropCycle\Http\Resources\CropCycleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CropCycleController extends Controller
{
    public function index()
    {
        $cycles = CropCycle::where('user_id', Auth::id())->with('stages')->get();
        return CropCycleResource::collection($cycles);
    }

    public function store(StoreCropCycleRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $cycle = CropCycle::create($data);
        return new CropCycleResource($cycle->load('stages'));
    }
}
