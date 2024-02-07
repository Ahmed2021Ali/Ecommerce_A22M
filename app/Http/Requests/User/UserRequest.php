<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $id = request()->id;
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' .$id,
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
        ];
    }
}
