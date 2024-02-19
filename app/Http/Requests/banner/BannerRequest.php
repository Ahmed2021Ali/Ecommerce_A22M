<?php

namespace App\Http\Requests\banner;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'small_title'=> ['required','string','min:3','max:25'],
            'main_title'=> ['required','string','min:2','max:25'],
            'status'=> ['required','integer','between:0,1'],
            'product_id' => ['required','exists:products,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'small_title.required' => 'حقل مطلوب.',
            'small_title.string' => 'حقل العنوان الفرعي يجب أن يكون نصًا.',
            'small_title.min' => 'يجب ألا يقل العنوان الفرعي 2 حرفًا.',
            'small_title.max' => 'يجب ألا يتجاوز العنوان الفرعي 25 حرفًا.',

            'main_title.required' => 'حقل مطلوب.',
            'main_title.string' => 'حقل العنوان الرئيسي يجب أن يكون نصًا.',
            'main_title.min' => 'يجب ألا يقل العنوان الفرعي 2 حرفًا.',
            'main_title.max' => 'يجب ألا يتجاوز العنوان الرئيسي 25 حرفًا.',

            'status.required' => 'حقل مطلوب.',
            'status.integer' => 'حقل الحالة يجب أن يكون رقمًا صحيحًا.',
            'status.between' => 'يجب أن تكون حالة العنصر بين 0 و 1.',

            'product_id.required' => 'حقل معرف المنتج مطلوب.',
            'product_id.exists' => 'قيمة معرف المنتج غير صالحة.',
        ];
    }
}
