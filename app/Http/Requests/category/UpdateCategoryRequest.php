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
            'name'=>['nullable','string','max:25'],
            'files.*'=>['nullable','mimes:png,jpg,jpeg'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'يجب أن يكون حقل الاسم نصًا.',
            'name.max' => 'يجب ألا يتجاوز حقل الاسم 25 حرفًا.',
            'files.*.mimes' => 'يجب أن يكون النوع الملف ممتد إلى png، jpg، أو jpeg.',
        ];
    }
}
