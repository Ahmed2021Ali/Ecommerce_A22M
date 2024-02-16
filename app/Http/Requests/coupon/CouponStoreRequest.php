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
            'name'=>['required','string','max:150'],
            'value'=>['required','numeric' ,'min:1','max:99'],
            'status'=>['nullable','integer','between:0,1'],

        ];
    }
}
