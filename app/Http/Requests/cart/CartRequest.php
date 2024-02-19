<?php

namespace App\Http\Requests\cart;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CartRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'quantity'=>['required','string','min:1','max:99'],
            'color'=>['nullable'],
            'size'=>['nullable'],
            'button'=>['required',Rule::in(['addCart', 'payNow'])],
        ];
    }

    public function messages(): array
    {
        return [
            'quantity.required' => 'حقل الكمية مطلوب.',
            'quantity.string' => 'يجب أن تكون الكمية رقمًا.',
            'quantity.min' => 'حقل الكمية لا يقل عن واحد .',
            'quantity.max' => 'حقل الكمية لا يزيد 99 منتج في المرة الواحدة .',

            'color.nullable' => 'حقل الكمية مطلوب.',
            'size.nullable' => 'حقل الكمية مطلوب.',

            'button.required' => 'حقل الزر مطلوب.',
            'button.in' => 'يجب أن يكون الزر إما "إضافة إلى السلة" أو "الدفع الآن".',
        ];
    }
}
