<?php

namespace App\Http\Requests\color;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ColorRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>['required','string','min:1','max:25'],
            'value'=>['required','string','min:1','max:25',Rule::unique('colors','value')->ignore($this->color->id??null, 'id')],
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون الاسم نصًا.',
            'name.min' => 'الحقل لا يقل عن حرف واحد.',
            'name.max' => 'الحقل لا يزيد عن 25 حرفا ',

            'value.string' => 'يجب أن يكون الاسم نصًا.',
            'value.required' => 'حقل القيمة مطلوب.',
            'value.min' => 'الحقل لا يقل عن حرف واحد.',
            'value.max' => 'يجب ألا يتجاوز الاسم 25 حرفًا.',
            'value.unique' => 'القيمة مستخدمة بالفعل.',
        ];
    }
}
