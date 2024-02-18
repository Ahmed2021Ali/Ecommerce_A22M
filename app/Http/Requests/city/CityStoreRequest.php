<?php

namespace App\Http\Requests\city;

use Illuminate\Foundation\Http\FormRequest;

class CityStoreRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>['required', 'string', 'max:25'],
            'price'=>['nullable', 'numeric'],
        ];
    }

        public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون الاسم نصًا.',
            'name.max' => 'يجب ألا يتجاوز الاسم 25 حرفًا.',
            'price.nullable' => 'حقل السعر يمكن أن يكون فارغًا.',
            'price.numeric' => 'يجب أن يكون السعر رقمًا.',
        ];
    }
}
