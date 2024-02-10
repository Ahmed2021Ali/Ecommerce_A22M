<?php

namespace App\Http\Requests\cart;

use Illuminate\Foundation\Http\FormRequest;

class CartStoreRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'quantity'=>['required'],
            'color'=>['nullable'],
            'size'=>['nullable'],
        ];
    }
}
