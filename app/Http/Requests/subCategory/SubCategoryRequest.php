<?php

namespace App\Http\Requests\subCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubCategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:25'],
            'category_id' => ['required', 'numeric', 'exists:categories,id'],
            'files.*'=>['required','max:5000','mimes:png,jpg,jpeg'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون حقل الاسم نصًا.',
            'name.max' => 'يجب ألا يتجاوز حقل الاسم 25 حرفًا.',
            'name.unique' => 'الاسم  مستخدم بالفعل  - يرجي ادخال اسم قسم اخر.',

            'category_id.required' => 'حقل فئة المنتج مطلوب.',
            'category_id.integer' => 'يجب أن تكون فئة المنتج عددًا صحيحًا.',
            'category_id.exists' => 'الفئة المحددة غير موجودة.',

            'files.*.required' => 'يجب الصورة مطلوب.',
            'files.*.max' => 'يجب أن لا يتجاوز حجم الملف 50000 كيلوبايت.',
            'files.*.mimes' => 'يجب أن يكون النوع الملف ممتد إلى png، jpg، أو jpeg.',
            ];
    }
}
