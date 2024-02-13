<?php

namespace App\Http\Requests\color;

use Illuminate\Foundation\Http\FormRequest;

class ColorUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'small_title'=>['nullable'],
            'main_title'=>['nullable'],
            'status'=>['nullable','integer','between:0,1'],
            'files.*'=>['nullable','max:5000','mimes:png,jpg,jpeg'],
        ];
    }
}
