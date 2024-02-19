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
            'name' => 'required','string','min:0','mix:50',
            'email' => 'required','email',
            'phone' => 'required','numeric','min:4','max:20',
            'subject' => 'required','string','min:3','max:100',
            'message' => 'required','string','min:3','max:200',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.mix' => 'الاسم الا يزيد عن 50 حرف.',


            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يجب أن يكون البريد الإلكتروني صالحًا.',

            'phone.required' => 'حقل الهاتف مطلوب.',
            'phone.numeric' => 'يجب أن يكون الهاتف رقمًا.',
            'phone.min' => 'يجب أن يتألف الهاتف من 11 رقمًا.',

            'subject.required' => 'حقل الموضوع مطلوب.',
            'subject.string' => 'يجب أن يكون الموضوع نصًا.',
            'subject.mix' => 'الموضوع الا يقل عن 3 احرف.',
            'subject.min' => ' الموضوع الا يقل عن 100 احرف.',


            'message.required' => 'حقل الرسالة مطلوب.',
            'message.string' => 'يجب أن تكون الرسالة نصًا.',
            'message.mix' => 'الرسالة الا يقل عن 3 احرف.',
            'message.min' => ' الرسالة الا يقل عن 200 احرف.',
        ];
    }
}
