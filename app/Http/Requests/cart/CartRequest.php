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
            'color'=>['nullable', 'max:50'],
            'size'=>['nullable', 'max:50'],
            'button'=>['required',Rule::in(['addCart', 'payNow'])],
        ];
    }

    public function messages(): array
    {
        return [
            'quantity.required' => 'حقل الكمية مطلوب.',
            'quantity.string' => 'يجب أن يكون حقل الكمية نصًا.',
            'quantity.min' => 'الحد الأدنى للكمية هو 1.',
            'quantity.max' => 'الحد الأقصى للكمية هو 99.',
            'color.max' => 'الحد الأقصى لللون هو 50.',
            'size.max' => 'الحد الأقصى للحجم هو 50.',
            'button.required' => 'حقل الزر مطلوب.',
            'button.in' => 'قيمة غير صالحة لحقل الزر. يجب أن تكون "إضافة إلى السلة" أو "الدفع الفوري".',
        ];
    }
    
}
