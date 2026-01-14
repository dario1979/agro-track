<?php

use Domain\CropCycle\Http\Controllers\CropStageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Ejemplo de test
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->prefix('crop-cycles/{id}')->group(function () {
    Route::get('stages', [CropStageController::class, 'index']);
    Route::post('stages', [CropStageController::class, 'store']);
});


Route::get('/ping', function () {
    return ['message' => 'pong'];
});

