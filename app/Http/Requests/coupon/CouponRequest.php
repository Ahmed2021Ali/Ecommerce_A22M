<?php

namespace App\Http\Requests\coupon;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>['required','string','max:15',Rule::unique('coupons','name')->ignore($this->coupon->id??null, 'id')],
            'value'=>['required','string' ,'min:1','max:2'],
            'status'=>['required','integer','between:0,1'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'حقل الاسم يجب أن يكون نصًا.',
            'name.max' => 'يجب ألا يتجاوز الاسم 15 حرفًا.',
            'name.unique' => ' اسم الكوبون موحود بالفعل - برجاء ادخال اسم اخر.',

            'value.required' => 'حقل القيمة مطلوب.',
            'value.string' => 'حقل القيمة يجب أن يكون رقمًا.',
            'value.min' => 'يجب أن تكون القيمة على الأقل 1.',
            'value.max' => 'يجب ألا يزيد القيمة عن رقمين .',

            'status.integer' => 'حقل الحالة يجب أن يكون رقمًا صحيحًا.',
            'status.between' => 'يجب أن تكون حالة العنصر بين 0 و 1.',
        ];
    }
}
