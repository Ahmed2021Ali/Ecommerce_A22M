<?php

namespace App\Http\Requests\address;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddressRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fname' => ['required', 'string', 'max:25', 'min:2'],
            'lname' => ['required', 'string', 'max:25', 'min:2'],
            'phone' => ['required', 'string', 'min:4','max:20',],
            'address' => ['required', 'string', 'max:150', 'min:5'],
            'email' => ['required', 'email','min:10', 'max:40'],
            'note' => ['nullable', 'string', 'max:255'],
            'city_id'=>['required','string','exists:available_cities,id']
        ];
    }

    public function messages(): array
    {
        return [
            'fname.required' => 'حقل الاسم الأول مطلوب',
            'fname.string' => 'يجب أن يكون الاسم الأول نصًا',
            'fname.max' => 'يجب أن لا يتجاوز الاسم الأول 20 حرفًا',
            'fname.min' => 'يجب أن يحتوي الاسم الأول على الأقل 2 أحرف',

            'lname.required' => 'حقل الاسم الأخير مطلوب',
            'lname.string' => 'يجب أن يكون الاسم الأخير نصًا',
            'lname.max' => 'يجب أن لا يتجاوز الاسم الأخير 20 حرفًا',
            'lname.min' => 'يجب أن يحتوي الاسم الأخير على الأقل 2 أحرف',

            'phone.required' => 'حقل الهاتف مطلوب',
            'phone.string' => 'حقل الهاتف لابد ان يكون ارقام',
            'phone.max' => 'يجب أن لا يتجاوز حقل الهاتف 20 رقما',
            'phone.min' => 'يجب أن يحتوي حقل الهاتف على الأقل 4 ارقام',


            'address.required' => 'حقل العنوان مطلوب',
            'address.string' => 'يجب أن يكون العنوان نصًا',
            'address.max' => 'يجب أن لا يتجاوز العنوان 150 حرفًا',
            'address.min' => 'يجب أن يحتوي العنوان على الأقل 5 أحرف',

            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صحيح',
            'email.unique' => 'الاميل مستخدم بالفعل  - يرجي ادخال اميل اخر.',
            'email.min' => 'لابد عن يحتوي البريد اللكتروني ع gmail.com@ او ما يعادله',
            'email.max' => 'يجب أن لا يتجاوز البريد الإلكتروني 40 حرفًا',

            'note.nullable' => 'حقل الملاحظات يمكن أن يكون نصًا',
            'note.string' => 'يجب أن يكون حقل الملاحظات نصًا',
            'note.max' => 'يجب أن لا يتجاوز حقل الملاحظات 255 حرفًا',

            'city_id.required' => 'حقل معرف المدينة مطلوب',
        ];
    }

}
