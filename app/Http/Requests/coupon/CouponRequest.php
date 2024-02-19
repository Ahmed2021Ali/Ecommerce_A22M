<?php

namespace App\Http\Requests\coupon;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>['required','string','max:75'],
            'value'=>['required','numeric' ,'min:1','max:25'],
            'status'=>['required','integer','between:0,1'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'حقل الاسم يجب أن يكون نصًا.',
            'name.max' => 'يجب ألا يتجاوز الاسم 75 حرفًا.',
            'value.required' => 'حقل القيمة مطلوب.',
            'value.numeric' => 'حقل القيمة يجب أن يكون رقمًا.',
            'value.min' => 'يجب أن تكون القيمة على الأقل 1.',
            'value.max' => 'يجب ألا تتجاوز القيمة 25.',
            'status.integer' => 'حقل الحالة يجب أن يكون رقمًا صحيحًا.',
            'status.between' => 'يجب أن تكون حالة العنصر بين 0 و 1.',
        ];
    }
}
