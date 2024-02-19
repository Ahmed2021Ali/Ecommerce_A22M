<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email' => 'required|email|max:50|min:5',
            'password' => 'required|min:8|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يرجى إدخال عنوان بريد إلكتروني صالح.',
            'email.max' => 'يجب ألا يتجاوز طول البريد الإلكتروني 50 حرفًا.',
            'email.min' => 'يجب أن يكون طول البريد الإلكتروني على الأقل 5 أحرف.',
            'password.required' => 'حقل كلمة المرور مطلوب.',
            'password.min' => 'يجب أن تحتوي كلمة المرور على الأقل 8 أحرف.',
            'password.max' => 'يجب ألا تتجاوز كلمة المرور 50 حرفًا.',
        ];
    }
    
}
