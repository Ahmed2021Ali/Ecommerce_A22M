<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ];
    }
}
