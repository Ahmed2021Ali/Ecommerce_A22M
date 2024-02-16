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
            'color.*' => ['nullable','string','max:75'],
            'size.*' => ['nullable','string','max:50'],
            'quantity' => ['required', 'integer', 'max:999', 'min:1'],
            'price' => ['required', 'numeric', 'max:99999.99', 'min:1'],
            'offer' => ['nullable', 'integer', 'max:99', 'min:1'],
            'status' => ['nullable', 'integer', 'between:0,1'],
            'category_id' => ['nullable', 'integer', 'exists:categories,id'],
            'description' => ['nullable', 'string'],
            'files.*' => ['nullable', 'max:1000', 'mimes:png,jpg,jpeg,webp'],
        ];
    }
}
