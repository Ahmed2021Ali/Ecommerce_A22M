<?php

namespace App\Http\Requests\brand;

use Illuminate\Foundation\Http\FormRequest;

class BrandStoreRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'status'=>['required','integer','between:0,1'],
            'files.*'=>['nullable','max:5000','mimes:png,jpg,jpeg'],

        ];
    }
}
