<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:25'],
            'files.*'=>['required','max:2000','mimes:png,jpg,jpeg'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون حقل الاسم نصًا.',
            'name.max' => 'يجب ألا يتجاوز حقل الاسم 25 حرفًا.',
            'files.*.required' => 'حقل الملفات مطلوب.',
            'files.*.max' => 'يجب أن لا يتجاوز حجم الملف 2000 كيلوبايت.',
            'files.*.mimes' => 'يجب أن يكون النوع الملف ممتد إلى png، jpg، أو jpeg.',
        ];
    }
}
