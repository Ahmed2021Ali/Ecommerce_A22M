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
            'name' => 'required|max:25|unique:roles,name,' .$id,
            'permission' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.max' => 'يجب أن لا يتجاوز حقل الاسم 25 حرفًا.',
            'name.unique' => 'هذا الاسم مستخدم بالفعل، يرجى اختيار اسم آخر.',
            'permission.required' => 'يجب اختيار صلاحية واحدة على الأقل.',
        ];
    }
}
