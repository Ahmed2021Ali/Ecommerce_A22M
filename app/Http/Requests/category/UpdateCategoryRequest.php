<?php

namespace App\Http\Requests\category;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>['nullable','string'],
            'files.*'=>['nullable','mimes:png,jpg,jpeg'],
        ];
    }
}
