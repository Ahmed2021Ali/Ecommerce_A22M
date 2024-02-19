<?php

namespace App\Http\Requests\brand;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'status'=>['required','integer','between:0,1'],
            'files.*'=>['required','max:2000','mimes:png,jpg,jpeg'],
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'حقل الحالة مطلوب.',
            'status.integer' => 'حقل الحالة يجب أن يكون رقمًا صحيحًا.',
            'status.between' => 'يجب أن تكون حالة العنصر بين 0 و 1.',
            'files.*.required' => 'حقل الملفات مطلوب.',
            'files.*.max' => 'يجب ألا يتجاوز حجم الملف 2000 كيلوبايت.',
            'files.*.mimes' => 'يجب أن يكون النوع الملف ممتد إلى png، jpg، أو jpeg.',
        ];
    }
}
