<?php

namespace App\Http\Requests\service;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>['nullable'],
            'status'=>['nullable','integer','between:0,1'],
            'files.*'=>['required','max:5000','mimes:png,jpg,jpeg'],
        ];
    }
}
