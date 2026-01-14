<?php

namespace Domain\CropCycle\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCropCycleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'crop_type' => 'required|string|max:100',
            'location' => 'nullable|string|max:255',
            'sowing_date' => 'required|date',
            'estimated_harvest_date' => 'nullable|date|after_or_equal:sowing_date',
        ];
    }
}
