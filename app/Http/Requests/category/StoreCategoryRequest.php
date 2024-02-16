<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>['required','string'],
            'files.*'=>['required','max:2000','mimes:png,jpg,jpeg'],        ];
    }
}
