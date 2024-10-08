<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:40'],
            'color.*' => ['nullable','string'],
            'size.*' => ['nullable','string'],
            'quantity' => ['required', 'numeric', 'min:1','max:1000'],
            'price' => ['required', 'numeric', 'min:1', 'max:9999.99'],
            'offer' => ['nullable', 'numeric', 'max:99', 'min:1'],
            'status' => ['required', 'integer', 'between:0,1'],
            'description' => ['required', 'string','min:2','max:255'],
            'files.*'=>['required','max:10000'],
            'sub_category_id' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
{
    return [
        'name.required' => 'حقل الاسم مطلوب.',
        'name.string' => 'يجب أن يكون حقل الاسم نصًا.',
        'name.max' => 'يجب ألا يتجاوز حقل الاسم 40 حرفًا.',
        'name.min' => 'يجب أن يكون حقل الاسم على الأقل 2 أحرف.',

        'color.*.nullable' => 'هذا الحقل اختياري',
        'color.*.string' => 'يجب أن تكون حقل اللون نصًا.',
        'color.*.max' => 'يجب ألا يتجاوز حقل اللون 25 حرفًا.',
        'color.*.min' => 'يجب أن يكون حقل الاسم على الأقل 2 أحرف.',

        'size.*.nullable' => 'هذا الحقل اختياري',
        'size.*.string' => 'يجب أن تكون حقل المقاس نصًا.',
        'size.*.max' => 'يجب ألا يتجاوز حقل الحجم 30 حرفًا.',
        'size.*.min' => 'يجب الا يقل حقل المقاس عن 2 احرف .',


        'quantity.required' => 'حقل الكمية مطلوب.',
        'quantity.string' => 'يجب أن تكون الكمية عددًا صحيحًا.',
        'quantity.min' => 'يجب أن تكون الكمية على الأقل 1.',
        'quantity.mix' => 'يجب الا يزيد الكمية على الأقل 10000.',



        'price.required' => 'حقل السعر مطلوب.',
        'price.string' => 'يجب أن يكون السعر رقمًا.',
        'price.max' => 'يجب ألا يتجاوز السعر 99999.99.',
        'price.min' => 'يجب أن يكون السعر على الأقل 1.',

        'offer.nullable' => 'هذا الحقل اختياري',
        'offer.string' => 'يجب أن يكون العرض عددًا صحيحًا.',
        'offer.max' => 'يجب ألا يتجاوز العرض 99.',
        'offer.min' => 'يجب أن يكون العرض على الأقل 1.',

        'status.required' => 'حقل الحالة مطلوب.',
        'status.integer' => 'يجب أن تكون الحالة عددًا صحيحًا.',
        'status.between' => 'يجب أن تكون الحالة بين 0 و 1.',

        'description.required' => 'حقل الوصف مطلوب.',
        'description.string' => 'يجب أن يكون حقل الوصف نصًا.',
        'description.max' => 'يجب ألا يتجاوز الوصف 200 حرف .',
        'description.min' => 'يجب أن يكون الوصف على الأقل 2.',

        'files.*.required' => 'حقل الملفات مطلوب.',
        'files.*.max' => 'يجب ألا يتجاوز حجم الملف 4000 كيلوبايت.',
        'files.*.mimes' => ' يجب أن يكون النوع الملف ممتد إلى   .gif و  png، jpg، أو jpeg.',

        'sub_category_id.required' => 'حقل فئة المنتج مطلوب.',
        'sub_category_id.integer' => 'يجب أن تكون فئة المنتج عددًا صحيحًا.',
        'sub_category_id.exists' => 'الفئة المحددة غير موجودة.',
    ];
}
}
