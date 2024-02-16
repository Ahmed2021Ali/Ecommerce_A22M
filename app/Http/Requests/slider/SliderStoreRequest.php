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
            'title_h1'=>['nullable','string','max:150'],
            'title_h2'=>['nullable','string','max:150'],
            'title_h4'=>['nullable','string','max:150'],
            'title_p'=>['nullable','string','max:150'],
            'status'=>['nullable','integer','between:0,1'],
            'files.*'=>['required','max:2000','mimes:png,jpg,jpeg'],
        ];
    }
}
