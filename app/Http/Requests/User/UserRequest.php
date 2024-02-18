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
            'password' => 'required|same:confirm-password|min:8',
            'roles' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.max' => 'يجب ألا يتجاوز حقل الاسم 25 حرفًا.',
            'name.string' => 'يجب أن يكون حقل الاسم نصًا.',
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'البريد الإلكتروني يجب أن يكون عنوان بريد إلكتروني صالحًا.',
            'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل، يرجى اختيار بريد آخر.',
            'password.required' => 'حقل كلمة المرور مطلوب.',
            'password.same' => 'تأكيد كلمة المرور غير متطابق.',
            'password.min' => 'يجب أن تتكون كلمة المرور على الأقل من 8 أحرف.',
            'roles.required' => 'يجب اختيار دور واحد على الأقل.',
            'roles.array' => 'حقل الأدوار يجب أن يكون مصفوفة.',
        ];
    }
}
