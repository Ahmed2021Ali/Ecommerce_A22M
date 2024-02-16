<?php

namespace App\Http\Requests\cart;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CartRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'quantity'=>['required','numeric'],
            'color'=>['nullable'],
            'size'=>['nullable'],
            'button'=>['required',Rule::in(['addCart', 'payNow'])],
        ];
    }
}
