<?php

namespace App\Http\Requests\address;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fname' => ['required', 'string', 'max:256', 'min:2'],
            'lname' => ['required', 'string', 'max:256', 'min:2'],
            'phone' => ['required'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'note' => ['nullable', 'string'],
            'city_id'=>['required']

        ];
    }

    public function messages(): array
{
    return [
        'fname.required' => 'حقل الاسم الأول مطلوب.',
        'fname.string' => 'حقل الاسم الأول يجب أن يكون نصًا.',
        'fname.max' => 'يجب ألا يتجاوز الاسم الأول 256 حرفًا.',
        'fname.min' => 'يجب أن يحتوي الاسم الأول على الأقل 2 حروف.',
        'lname.required' => 'حقل الاسم الأخير مطلوب.',
        'lname.string' => 'حقل الاسم الأخير يجب أن يكون نصًا.',
        'lname.max' => 'يجب ألا يتجاوز الاسم الأخير 256 حرفًا.',
        'lname.min' => 'يجب أن يحتوي الاسم الأخير على الأقل 2 حروف.',
        'phone.required' => 'حقل الهاتف مطلوب.',
        'address.required' => 'حقل العنوان مطلوب.',
        'address.string' => 'حقل العنوان يجب أن يكون نصًا.',
        'address.max' => 'يجب ألا يتجاوز العنوان 255 حرفًا.',
        'email.required' => 'حقل البريد الإلكتروني مطلوب.',
        'email.email' => 'يجب أن يكون البريد الإلكتروني صالحًا.',
        'note.string' => 'حقل الملاحظات يجب أن يكون نصًا.',
        'city_id.required' => 'حقل معرف المدينة مطلوب.',
    ];
}
}
