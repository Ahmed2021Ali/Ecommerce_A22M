<?php

namespace App\Http\Requests\color;

use Illuminate\Foundation\Http\FormRequest;

class ColorStoreRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>['required','string','max:75'],
            'value'=>['required','unique:colors'],
        ];
    }
}
