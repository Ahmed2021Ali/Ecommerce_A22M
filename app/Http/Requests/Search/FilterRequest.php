<?php

namespace App\Http\Requests\Search;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'price' => ['required', 'min:1', 'max:1000000'],
            'color' => ['nullable', 'max:50'], // Assuming colors can be an array
            'color.*' => ['nullable', 'max:50'], // Assuming each color value is a string
        ];
    }
    
    public function messages()
    {
        return [
            'price.required' => 'حقل السعر مطلوب.',
            'price.numeric' => 'يجب أن يكون حقل السعر رقمًا.',
            'price.min' => 'الحد الأدنى لقيمة السعر هو 1.',
            'price.max' => 'الحد الأقصى لقيمة السعر هو 1,000,000.',
            'color.array' => 'حقل الألوان يجب أن يكون مصفوفة.',
            'color.*.string' => 'يجب أن تكون قيم الألوان نصوصًا.',
            'color.*.max' => 'الحد الأقصى لطول كل قيمة لون هو 50 حرفًا.',
        ];
    }
}
