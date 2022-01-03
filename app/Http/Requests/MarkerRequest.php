<?php

namespace App\Http\Requests;

use App\Models\Marker;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MarkerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique(Marker::class, 'name'),
            ],
            'description' => [
                'sometimes',
                'string',
                'max:600',
            ],
            'long' => [
                'required',
                'between:-180,180'
            ],
            'lat' => [
                'required',
                'between:-90,90'
            ]
        ];
    }
}
