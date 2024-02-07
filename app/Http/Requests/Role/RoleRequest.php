<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $id = request()->id;
        return [
            'name' => 'required|unique:roles,name,' .$id,
            'permission' => 'required',
        ];
    }
}
