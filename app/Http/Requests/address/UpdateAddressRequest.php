<?php

namespace App\Http\Requests\address;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fname'=>['nullable','string','max:256','min:2'],
            'lname'=>['nullable','string','max:256','min:2'],
            'city'=>['nullable','string','max:256','min:2'],
            'phone' => ['required','numeric','digits:11','regex:/^([0-9\s\-\+\(\)]*)$/'],
            'address' => ['nullable','string', 'max:255'],
            'email' => ['nullable','email'],
            'note'=>['nullable','string']
        ];
    }
}
