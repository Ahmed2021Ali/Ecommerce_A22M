<?php

namespace App\Http\Requests\brand;

use Illuminate\Foundation\Http\FormRequest;

class BrandUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status'=>['nullable','integer','between:0,1'],
            'files.*'=>['nullable','max:2000','mimes:png,jpg,jpeg'],

        ];
    }
}
