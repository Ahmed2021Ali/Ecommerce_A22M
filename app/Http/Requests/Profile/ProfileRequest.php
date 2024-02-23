<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|min:5|max:30',
            'email' => 'required|email|max:50|min:5|unique:users,email,' . Auth::user()->id,
            'files.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6144',
        ];
    
        // Only require password if a new password is provided
        if ($this->filled('password')) {
            $rules['password'] = 'required|string|min:6|max:50|confirmed';
        }
    
        return $rules;
    }

    public function messages(): array
{
    return [
        'name.required' => 'حقل الاسم مطلوب.',
        'name.string' => 'يجب أن يكون الاسم نصًا.',
        'name.max' => 'يجب ألا يتجاوز الاسم 30 حرفًا.',

        'email.required' => 'حقل البريد الإلكتروني مطلوب.',
        'email.email' => 'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صالحًا.',
        'email.max' => 'يجب ألا يتجاوز البريد الإلكتروني 50 حرفًا.',
        'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل.',

        'password.string' => 'يجب أن تكون كلمة المرور نصًا.',
        'password.min' => 'يجب أن تكون كلمة المرور على الأقل 6 أحرف.',
        'password.confirmed' => 'تأكيد كلمة المرور غير متطابق مع كلمة المرور.',

        'files.*.image' => 'يجب أن يكون الملف المحدد صورة.',
        'files.*.mimes' => 'يجب أن يكون الملف بأحد الامتدادات التالية: jpeg، png، jpg، gif.',
        'files.*.max' => 'يجب ألا يتجاوز حجم الملف :max كيلوبايت.',
    ];
}

}
