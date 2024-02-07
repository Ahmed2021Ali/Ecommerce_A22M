<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:256', 'min:2'],
            'color.*' => ['nullable', 'string'],
            'size.*' => ['nullable', 'string'],
            'quantity' => ['required', 'integer', 'max:999', 'min:1'],
            'price' => ['required', 'numeric', 'max:99999.99', 'min:1'],
            'offer' => ['nullable', 'integer', 'max:99', 'min:1'],
            'status' => ['required', 'integer', 'between:0,1'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'description' => ['required', 'string'],
            'files.*' => ['nullable', 'max:1000', 'mimes:png,jpg,jpeg,webp'],
        ];
    }
}
