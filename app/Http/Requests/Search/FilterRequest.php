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
            'price' => ['required', 'min:1'],
            'color' => ['nullable'], // Assuming colors can be an array
            'color.*' => ['nullable'], // Assuming each color value is a string
        ];
    }
    
    public function messages(): array
    {
        return [
            'price.required' => 'حقل السعر مطلوب.',
            'price.numeric' => 'يجب أن يكون السعر رقمًا.',
            'price.min' => 'يجب أن يكون السعر على الأقل 1.',
        ];
    }
}
