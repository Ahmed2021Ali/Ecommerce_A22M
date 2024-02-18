<?php

namespace App\Http\Requests\slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title_h1'=>['nullable','string','max:150'],
            'title_h2'=>['nullable','string','max:150'],
            'title_h4'=>['nullable','string','max:150'],
            'title_p'=>['nullable','string','max:150'],
            'status'=>['nullable','integer','between:0,1'],
            'files.*'=>['nullable','max:2000','mimes:png,jpg,jpeg'],
        ];
    }

    public function messages(): array
    {
        return [
            'title_h1.string' => 'حقل العنوان الرئيسي يجب أن يكون نصًا.',
            'title_h1.max' => 'يجب ألا يتجاوز العنوان الرئيسي 150 حرفًا.',
            'title_h2.string' => 'حقل العنوان الفرعي يجب أن يكون نصًا.',
            'title_h2.max' => 'يجب ألا يتجاوز العنوان الفرعي 150 حرفًا.',
            'title_h4.string' => 'حقل العنوان فرعي يجب أن يكون نصًا.',
            'title_h4.max' => 'يجب ألا يتجاوز العنوان الفرعي 150 حرفًا.',
            'title_p.string' => 'حقل الفقرة يجب أن يكون نصًا.',
            'title_p.max' => 'يجب ألا يتجاوز الفقرة 150 حرفًا.',
            'status.integer' => 'حقل الحالة يجب أن يكون رقمًا صحيحًا.',
            'status.between' => 'يجب أن تكون حالة التصميم بين 0 و 1.',
            'files.*.nullable' => 'حقل الملفات يمكن أن يكون فارغًا.',
            'files.*.max' => 'يجب ألا يتجاوز حجم الملف 2000 كيلوبايت.',
            'files.*.mimes' => 'يجب أن يكون النوع الملف ممتد إلى png، jpg، أو jpeg.',
        ];
    }
}
