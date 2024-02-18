<?php

namespace App\Http\Requests\address;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'phone' => ['required', 'max:50', 'min:1'],
            'address' => ['required', 'string', 'max:255', 'min:5'],
            'email' => ['required', 'email', 'max:60'],
            'note' => ['nullable', 'string', 'max:255'],
            'city_id'=>['required']

        ];
    }

    public function messages(): array
    {
        return [
            'fname.required' => 'حقل الاسم الأول مطلوب',
            'fname.string' => 'يجب أن يكون الاسم الأول نصًا',
            'fname.max' => 'يجب أن لا يتجاوز الاسم الأول 25 حرفًا',
            'fname.min' => 'يجب أن يحتوي الاسم الأول على الأقل 2 أحرف',
            
            'lname.required' => 'حقل الاسم الأخير مطلوب',
            'lname.string' => 'يجب أن يكون الاسم الأخير نصًا',
            'lname.max' => 'يجب أن لا يتجاوز الاسم الأخير 25 حرفًا',
            'lname.min' => 'يجب أن يحتوي الاسم الأخير على الأقل 2 أحرف',
    
            'phone.required' => 'حقل الهاتف مطلوب',
            'phone.max' => 'يجب أن لا يتجاوز حقل الهاتف 50 حرفًا',
            'phone.min' => 'يجب أن يحتوي حقل الهاتف على الأقل حرف واحد',
    
            'address.required' => 'حقل العنوان مطلوب',
            'address.string' => 'يجب أن يكون العنوان نصًا',
            'address.max' => 'يجب أن لا يتجاوز العنوان 255 حرفًا',
            'address.min' => 'يجب أن يحتوي العنوان على الأقل 5 أحرف',
    
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صحيح',
            'email.max' => 'يجب أن لا يتجاوز البريد الإلكتروني 60 حرفًا',
    
            'note.nullable' => 'حقل الملاحظات يمكن أن يكون نصًا',
            'note.string' => 'يجب أن يكون حقل الملاحظات نصًا',
            'note.max' => 'يجب أن لا يتجاوز حقل الملاحظات 255 حرفًا',
    
            'city_id.required' => 'حقل معرف المدينة مطلوب',
        ];
    }
    
}
