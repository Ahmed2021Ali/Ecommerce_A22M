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
            'comment'=>['required','max:150'],
            'star'=>['nullable','numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'comment.required' => 'حقل التعليق مطلوب.',
            'comment.max' => 'الحقل لا يزيد عن 150 كلمة ',
            'star.nullable' => 'حقل التقييم يمكن أن يكون فارغًا.',
        ];
    }
}
