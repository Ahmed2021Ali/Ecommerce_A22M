<?php

namespace App\Http\Requests\contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email,',
            'phone' => 'required|numeric|digits:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'subject' => 'required|string',
            'message' => 'required|string',
        ];
    }
}
