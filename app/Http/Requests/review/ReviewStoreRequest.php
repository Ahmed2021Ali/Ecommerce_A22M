<?php

namespace App\Http\Requests\review;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'comment'=>['required'],
            'star'=>['nullable'],
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
