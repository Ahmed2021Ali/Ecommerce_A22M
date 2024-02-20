<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:25',Rule::unique('categories','name')->ignore($this->category->id??null, 'id')],
            'files.*'=>['nullable','max:5000','mimes:png,jpg,jpeg'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون حقل الاسم نصًا.',
            'name.max' => 'يجب ألا يتجاوز حقل الاسم 25 حرفًا.',
            'name.unique' => 'الاسم  مستخدم بالفعل  - يرجي ادخال اسم قسم اخر.',

            'files.*.required' => 'حقل الملفات مطلوب.',
            'files.*.max' => 'يجب أن لا يتجاوز حجم الملف 50000 كيلوبايت.',
            'files.*.mimes' => 'يجب أن يكون النوع الملف ممتد إلى png، jpg، أو jpeg.',
        ];
    }
}
