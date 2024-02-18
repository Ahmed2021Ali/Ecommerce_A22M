<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:256', 'min:2'],
            'color.*' => ['nullable','string','max:75'],
            'size.*' => ['nullable','string','max:50'],
            'quantity' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'numeric', 'max:9999.99', 'min:1'],
            'offer' => ['nullable', 'integer', 'max:99', 'min:1'],
            'status' => ['required', 'integer', 'between:0,1'],
            'description' => ['required', 'string'],
            'files.*' => ['required','max:5000'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ];
    }

    public function messages(): array
{
    return [
        'name.required' => 'حقل الاسم مطلوب.',
        'name.string' => 'يجب أن يكون حقل الاسم نصًا.',
        'name.max' => 'يجب ألا يتجاوز حقل الاسم 256 حرفًا.',
        'name.min' => 'يجب أن يكون حقل الاسم على الأقل 2 أحرف.',
        'color.*.string' => 'يجب أن تكون حقل اللون نصًا.',
        'color.*.max' => 'يجب ألا يتجاوز حقل اللون 75 حرفًا.',
        'size.*.string' => 'يجب أن تكون حقل الحجم نصًا.',
        'size.*.max' => 'يجب ألا يتجاوز حقل الحجم 50 حرفًا.',
        'quantity.required' => 'حقل الكمية مطلوب.',
        'quantity.integer' => 'يجب أن تكون الكمية عددًا صحيحًا.',
        'quantity.min' => 'يجب أن تكون الكمية على الأقل 1.',
        'price.required' => 'حقل السعر مطلوب.',
        'price.numeric' => 'يجب أن يكون السعر رقمًا.',
        'price.max' => 'يجب ألا يتجاوز السعر 9999.99.',
        'price.min' => 'يجب أن يكون السعر على الأقل 1.',
        'offer.integer' => 'يجب أن يكون العرض عددًا صحيحًا.',
        'offer.max' => 'يجب ألا يتجاوز العرض 99.',
        'offer.min' => 'يجب أن يكون العرض على الأقل 1.',
        'status.required' => 'حقل الحالة مطلوب.',
        'status.integer' => 'يجب أن تكون الحالة عددًا صحيحًا.',
        'status.between' => 'يجب أن تكون الحالة بين 0 و 1.',
        'description.required' => 'حقل الوصف مطلوب.',
        'description.string' => 'يجب أن يكون حقل الوصف نصًا.',
        'files.*.required' => 'حقل الملفات مطلوب.',
        'files.*.max' => 'يجب ألا يتجاوز حجم الملف 5000 كيلوبايت.',
        'category_id.required' => 'حقل فئة المنتج مطلوب.',
        'category_id.integer' => 'يجب أن تكون فئة المنتج عددًا صحيحًا.',
        'category_id.exists' => 'الفئة المحددة غير موجودة.',
    ];
}
}
