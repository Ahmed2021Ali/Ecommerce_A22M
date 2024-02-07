<?php

namespace App\Http\Requests\service;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'=>['nullable'],
            'status'=>['nullable','integer','between:0,1'],
        ];
    }
}
