<?php

namespace App\Http\Requests\contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required','string','min:5','mix:50',
            'email' => 'required','email','mix:50',
            'phone' => 'required','numeric','min:4','max:20',
            'subject' => 'required','string','min:3','max:100',
            'message' => 'required','string','min:3','max:200',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون حقل الاسم نصًا.',
            'name.min' => 'الحد الأدنى لطول الاسم هو 5 أحرف.',
            'name.max' => 'الحد الأقصى لطول الاسم هو 50 حرفًا.',
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'البريد الإلكتروني يجب أن يكون عنوان بريد إلكتروني صالحًا.',
            'email.max' => 'الحد الأقصى لطول البريد الإلكتروني هو 50 حرفًا.',
            'phone.required' => 'حقل الهاتف مطلوب.',
            'phone.numeric' => 'يجب أن يكون حقل الهاتف رقمًا.',
            'phone.min' => 'الحد الأدنى لطول رقم الهاتف هو 4 أرقام.',
            'phone.max' => 'الحد الأقصى لطول رقم الهاتف هو 20 رقمًا.',
            'subject.required' => 'حقل الموضوع مطلوب.',
            'subject.string' => 'يجب أن يكون حقل الموضوع نصًا.',
            'subject.min' => 'الحد الأدنى لطول الموضوع هو 3 أحرف.',
            'subject.max' => 'الحد الأقصى لطول الموضوع هو 100 حرف.',
            'message.required' => 'حقل الرسالة مطلوب.',
            'message.string' => 'يجب أن تكون الرسالة نصًا.',
            'message.min' => 'الحد الأدنى لطول الرسالة هو 3 أحرف.',
            'message.max' => 'الحد الأقصى لطول الرسالة هو 200 حرف.',
        ];
    }
}
