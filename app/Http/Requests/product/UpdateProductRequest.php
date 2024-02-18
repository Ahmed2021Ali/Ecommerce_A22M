<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'quantity' => ['required', 'integer', 'max:999', 'min:1'],
            'price' => ['required', 'numeric', 'max:99999.99', 'min:1'],
            'offer' => ['nullable', 'integer', 'max:99', 'min:1'],
            'status' => ['nullable', 'integer', 'between:0,1'],
            'category_id' => ['nullable', 'integer', 'exists:categories,id'],
            'description' => ['nullable', 'string'],
            'files.*' => ['nullable', 'max:1000', 'mimes:png,jpg,jpeg,webp'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون حقل الاسم نصًا.',
            'name.min' => 'يجب أن يحتوي حقل الاسم على الأقل على 2 أحرف.',
            'name.max' => 'يجب أن لا يتجاوز حقل الاسم 256 حرفًا.',
            'color.*.string' => 'يجب أن تكون الألوان نصوصًا.',
            'color.*.max' => 'يجب أن لا تتجاوز الألوان 75 حرفًا.',
            'size.*.string' => 'يجب أن تكون الأحجام نصوصًا.',
            'size.*.max' => 'يجب أن لا تتجاوز الأحجام 50 حرفًا.',
            'quantity.required' => 'حقل الكمية مطلوب.',
            'quantity.integer' => 'يجب أن تكون الكمية عددًا صحيحًا.',
            'quantity.min' => 'يجب أن تكون الكمية على الأقل 1.',
            'quantity.max' => 'يجب أن لا تتجاوز الكمية 999.',
            'price.required' => 'حقل السعر مطلوب.',
            'price.numeric' => 'يجب أن يكون السعر رقمًا.',
            'price.min' => 'يجب أن يكون السعر على الأقل 1.',
            'price.max' => 'يجب أن لا يتجاوز السعر 99999.99.',
            'offer.integer' => 'يجب أن يكون العرض رقمًا صحيحًا.',
            'offer.min' => 'يجب أن يكون العرض على الأقل 1.',
            'offer.max' => 'يجب أن لا يتجاوز العرض 99.',
            'status.integer' => 'يجب أن يكون حالة المنتج رقمًا صحيحًا.',
            'status.between' => 'يجب أن تكون حالة المنتج بين 0 و 1.',
            'category_id.integer' => 'يجب أن يكون معرف الفئة رقمًا صحيحًا.',
            'category_id.exists' => 'الفئة المحددة غير موجودة.',
            'description.string' => 'يجب أن تكون الوصف نصًا.',
            'files.*.max' => 'يجب أن لا يتجاوز حجم الملف 1000 كيلوبايت.',
            'files.*.mimes' => 'يجب أن يكون نوع الملف png، jpg، jpeg، أو webp.',
        ];
    }

}
