<?php

namespace App\Http\Requests\service;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>['required','string','min:2','max:25'],
            'status'=>['required','integer','between:0,1'],
            'files.*'=>['nullable','max:5000','mimes:png,jpg,jpeg'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم يجب الا يكون فارغا .',
            'name.string' => 'حقل الاسم يجب أن يكون نصًا.',
            'name.max' => 'يجب ألا يتجاوز الاسم 25 حرفًا.',
            'name.min' => 'يجب ألا يتجاوز الاسم 2 حرفًا.',

            'status.integer' => 'حقل الحالة يجب أن يكون رقمًا صحيحًا.',
            'status.between' => 'يجب أن تكون حالة العنصر بين 0 و 1.',

            'files.*.required' => 'حقل الملفات مطلوب.',
            'files.*.max' => 'يجب ألا يتجاوز حجم الملف 5000 كيلوبايت.',
            'files.*.mimes' => 'يجب أن يكون النوع الملف ممتد إلى png، jpg، أو jpeg.',
        ];
    }
}
