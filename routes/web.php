<?php

use Illuminate\Support\Facades\Route;
use Domain\CropCycle\Http\Controllers\CropCycleController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/crop-cycles', [CropCycleController::class, 'index']);
    Route::post('/crop-cycles', [CropCycleController::class, 'store']);
});
