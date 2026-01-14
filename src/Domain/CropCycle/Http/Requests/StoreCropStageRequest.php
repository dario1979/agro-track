<?php

namespace Domain\CropCycle\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCropStageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ];
    }
}
