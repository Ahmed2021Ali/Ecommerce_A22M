<?php

namespace App\Http\Requests\slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderStoreRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title_h1'=>['nullable'],
            'title_h2'=>['nullable'],
            'title_h4'=>['nullable'],
            'title_p'=>['nullable'],
            'status'=>['nullable','integer','between:0,1'],
            'files.*'=>['required','max:5000','mimes:png,jpg,jpeg'],
        ];
    }
}
