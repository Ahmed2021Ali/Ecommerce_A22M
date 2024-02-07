<?php

namespace App\Http\Requests\coupon;

use Illuminate\Foundation\Http\FormRequest;

class CouponStoreRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>['required'],
            'value'=>['required','numeric'],
            'status'=>['nullable','integer','between:0,1'],

        ];
    }
}
