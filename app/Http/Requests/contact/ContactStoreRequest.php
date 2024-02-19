<?php

namespace App\Http\Requests\contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'subject' => 'required|string',
            'message' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يجب أن يكون البريد الإلكتروني صالحًا.',
            'phone.required' => 'حقل الهاتف مطلوب.',
            'phone.numeric' => 'يجب أن يكون الهاتف رقمًا.',
            'phone.digits' => 'يجب أن يتألف الهاتف من 11 رقمًا.',
            'phone.regex' => 'صيغة الهاتف غير صالحة.',
            'subject.required' => 'حقل الموضوع مطلوب.',
            'subject.string' => 'يجب أن يكون الموضوع نصًا.',
            'message.required' => 'حقل الرسالة مطلوب.',
            'message.string' => 'يجب أن تكون الرسالة نصًا.',
        ];
    }
}
