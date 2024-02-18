<?php

namespace App\Http\Requests\color;

use Illuminate\Foundation\Http\FormRequest;

class ColorStoreRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>['required','string','max:30'],
            'value'=>['required','unique:colors'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون الاسم نصًا.',
            'name.max' => 'يجب ألا يتجاوز الاسم 30 حرفًا.',
            'value.required' => 'حقل القيمة مطلوب.',
            'value.unique' => 'القيمة مستخدمة بالفعل.',
        ];
    }
}
