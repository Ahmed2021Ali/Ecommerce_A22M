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
            'title_h1'=>['nullable','max:255'],
            'title_h2'=>['nullable','max:255'],
            'title_h4'=>['nullable','max:255'],
            'title_p'=>['nullable','max:255'],
            'status'=>['nullable','integer','between:0,1'],
            'files.*'=>['required','max:3000','mimes:png,jpg,jpeg'],
        ];
    }
}
