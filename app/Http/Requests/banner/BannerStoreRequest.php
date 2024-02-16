<?php

namespace App\Http\Requests\banner;

use Illuminate\Foundation\Http\FormRequest;

class BannerStoreRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'small_title'=>['nullable','string','max:100'],
            'main_title'=>['nullable','string','max:100'],
            'status'=>['nullable','integer','between:0,1'],
            'product_id' => 'required|exists:products,id',
        ];
    }
}
