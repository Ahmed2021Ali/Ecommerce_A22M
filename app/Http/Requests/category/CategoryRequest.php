<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:25'],
            ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون حقل الاسم نصًا.',
            'name.max' => 'يجب ألا يتجاوز حقل الاسم 25 حرفًا.',
            'name.unique' => 'الاسم  مستخدم بالفعل  - يرجي ادخال اسم قسم اخر.',

        ];
    }
}
