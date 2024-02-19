<?php

namespace App\Http\Requests\slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title_h1'=>['required','string','max:150'],
            'title_h2'=>['required','string','max:150'],
            'title_h4'=>['required','string','max:150'],
            'title_p'=>['required','string','max:150'],
            'status'=>['required','integer','between:0,1'],
            'files.*'=>['nullable','max:2000','mimes:png,jpg,jpeg'],
        ];
    }

    public function messages(): array
    {
        return [
            'title_h1.string' => 'يجب أن يكون العنوان الرئيسي نصًا.',
            'title_h1.max' => 'يجب ألا يتجاوز العنوان الرئيسي 150 حرفًا.',
            'title_h2.string' => 'يجب أن يكون العنوان الفرعي نصًا.',
            'title_h2.max' => 'يجب ألا يتجاوز العنوان الفرعي 150 حرفًا.',
            'title_h4.string' => 'يجب أن يكون العنوان فرعي نصًا.',
            'title_h4.max' => 'يجب ألا يتجاوز العنوان الفرعي 150 حرفًا.',
            'title_p.string' => 'يجب أن يكون الفقرة نصًا.',
            'title_p.max' => 'يجب ألا تتجاوز الفقرة 150 حرفًا.',
            'status.integer' => 'يجب أن يكون حالة التصميم عددًا صحيحًا.',
            'status.between' => 'يجب أن تكون حالة التصميم بين 0 و 1.',
            'files.*.required' => 'حقل الملفات مطلوب.',
            'files.*.max' => 'يجب ألا يتجاوز حجم الملف 2000 كيلوبايت.',
            'files.*.mimes' => 'يجب أن يكون النوع الملف ممتد إلى png، jpg، أو jpeg.',
        ];
    }
}
