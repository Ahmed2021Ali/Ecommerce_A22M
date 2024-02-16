<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'quantity' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'numeric', 'max:9999.99', 'min:1'],
            'offer' => ['nullable', 'integer', 'max:99', 'min:1'],
            'status' => ['required', 'integer', 'between:0,1'],
            'description' => ['required', 'string'],
            'files.*' => ['required','max:5000'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ];
    }
}
