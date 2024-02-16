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
            'name'=>['nullable','string','max:50'],
            'status'=>['nullable','integer','between:0,1'],
            'files.*'=>['required','max:2000','mimes:png,jpg,jpeg'],
        ];
    }
}
