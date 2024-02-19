<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|max:30|string|min:5',
            'email' => 'required|email|max:30|unique:users|min:5',
            'password' => 'required|confirmed|min:8|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.max' => 'يجب ألا يتجاوز طول الاسم 30 حرفًا.',
            'name.string' => 'يجب أن يكون الاسم نصًا.',
            'name.min' => 'يجب أن يكون طول الاسم على الأقل 5 أحرف.',
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يرجى إدخال عنوان بريد إلكتروني صالح.',
            'email.max' => 'يجب ألا يتجاوز طول البريد الإلكتروني 30 حرفًا.',
            'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل.',
            'email.min' => 'يجب أن يكون طول البريد الإلكتروني على الأقل 5 أحرف.',
            'password.required' => 'حقل كلمة المرور مطلوب.',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق.',
            'password.min' => 'يجب أن تحتوي كلمة المرور على الأقل 8 أحرف.',
            'password.max' => 'يجب ألا تتجاوز كلمة المرور 50 حرفًا.',
        ];
    }
    
}
