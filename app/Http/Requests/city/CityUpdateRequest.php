<?php

namespace App\Http\Requests\city;

use Illuminate\Foundation\Http\FormRequest;

class CityUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>['required'],
            'price'=>['nullable'],
        ];
    }
}
