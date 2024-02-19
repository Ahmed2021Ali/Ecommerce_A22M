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
            'comment'=>['required'],
            'star'=>['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'comment.required' => 'حقل التعليق مطلوب.',
            'star.nullable' => 'حقل التقييم يمكن أن يكون فارغًا.',
        ];
    }
}
