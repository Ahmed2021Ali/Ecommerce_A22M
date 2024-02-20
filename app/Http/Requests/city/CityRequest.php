<?php

namespace App\Http\Requests\city;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>['required', 'string', 'max:25','min:2',Rule::unique('available_cities','name')->ignore($this->city->id??null, 'id')],
            'price'=>['required', 'string','min:0','max:5000'],
        ];
    }

        public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون الاسم نصًا.',
            'name.max' => 'يجب ألا يتجاوز الاسم 25 حرفًا.',
            'name.unique' => 'الاسم المدينة مستخدم بالفعل - يرجاء استخدام اسم اخر.',

            'price.required' => 'حقل السعر يمكن أن يكون فارغًا.',
            'price.string' => 'يجب أن يكون السعر رقمًا.',
            'price.min' => 'يجب الا يقل السعر عن الصفر   .',
            'price.mix' => 'يجب الا يزيد سعر التوصيل عن 5000.',
        ];
    }
}
