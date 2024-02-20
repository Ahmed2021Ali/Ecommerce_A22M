<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $id = request()->id;
        return [
            'name' => 'required|max:25|string',
            'email' => 'required|email|unique:users,email,' .$id,
            'password' => 'required|same:confirm-password|min:8|max:50',
            'roles' => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون حقل الاسم نصًا.',
            'name.max' => 'الحد الأقصى لطول الاسم هو 25 حرفًا.',
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'البريد الإلكتروني يجب أن يكون عنوان بريد إلكتروني صالحًا.',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل.',
            'password.required' => 'حقل كلمة المرور مطلوب.',
            'password.string' => 'يجب أن تكون كلمة المرور نصًا.',
            'password.same' => 'يجب أن تكون كلمة المرور متطابقة مع حقل تأكيد كلمة المرور.',
            'password.min' => 'الحد الأدنى لطول كلمة المرور هو 8 أحرف.',
            'password.max' => 'الحد الأقصى لطول كلمة المرور هو 50 حرفًا.',
            'roles.required' => 'حقل الأدوار مطلوب.',
            'roles.string' => 'يجب أن يكون حقل الأدوار نصًا.',
            'roles.max' => 'الحد الأقصى لطول حقل الأدوار هو 50 حرفًا.',
        ];
    }
}
