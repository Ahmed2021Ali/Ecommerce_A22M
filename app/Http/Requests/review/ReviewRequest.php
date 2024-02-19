<?php

namespace App\Http\Requests\review;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'comment'=>['required','string','min:0','max:150'],
            'star'=>['required','numeric','min:1','max:5'],
        ];
    }

    public function messages(): array
    {
        return [
            'comment.required' => 'حقل التعليق لا يترك فارغا.',
            'comment.string' => 'يجب أن تكون حقل التعليق نصًا.',
            'comment.max' => 'الحقل لا يزيد عن 150 كلمة ',
            'comment.min' => 'يجب الا يقل حقل المقاس عن 2 احرف .',


            'star.required' => 'حقل التقييم  لا يترك فارغا.',
            'star.string' => 'يجب أن تكون حقل رقما .',
            'star.max' => 'الحقل لا يزيد عن 5 كلمة ',
            'star.min' => 'يجب الا يقل حقل المقاس عن 1 احرف .',
        ];
    }
}
