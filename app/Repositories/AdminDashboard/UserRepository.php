<?php

namespace App\Repositories\AdminDashboard;

use App\Repositories\Interfaces\AdminDashboard\UserInterface;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface {

    public function index($request)
    {
        $users = User::latest()->paginate(5);
        return view('adminDashboard.users.index',compact('users'));
    }



    public function create()
    {

        $roles = Role::pluck('name','name')->all();
        return view('adminDashboard.users.create',compact('roles'));
    }



    public function store($request)
    {
        $validatedData = $this->validateAndHashPassword($request->validated());
        $user = $this->createUser($validatedData);
        $this->assignRolesToUser($user, $validatedData['roles']);

        return redirect()->route('users.index')
                        ->with('success','تم اضافة المستخدم بنجاح');
    }


    //This method handles the validation and hashing of the user's password:
    public function validateAndHashPassword($data)
    {
        $data['password'] = Hash::make($data['password']);
        return $data;
    }

    public function createUser($data)
    {
        return User::create($data);
    }

    public function assignRolesToUser($user, $roles)
    {
        $user->assignRole($roles);
    }




    public function edit($id)
    {
        $user = $this->findUserById($id);
        $roles = $this->getAllRoles();
        $userRole = $this->getUserRoles($user);
        return view('adminDashboard.users.edit', compact('user', 'roles', 'userRole'));
    }

    public function findUserById($id)
    {
        return User::findOrFail($id);
    }

    public function getAllRoles()
    {
        return Role::pluck('name', 'name')->all();
    }





    /**
     * $user->roles refers to a relationship between the User model and the Role model, assuming a many-to-many relationship
     *  where a user can have multiple roles.
     *  pluck('name', 'name') is a Laravel Eloquent method that retrieves specific columns from the result. In this case,
     *  it selects the 'name' column from the roles associated with the user.
     *  The first 'name' specifies the column to be retrieved, and the second 'name' specifies the key for the resulting array.
     *  all() converts the result into an associative array, where the role names serve as both keys and values.
     */
    public function getUserRoles($user)
    {
        return $user->roles->pluck('name', 'name')->all();
    }






    public function update($request, $id)
    {
        $validatedData = $this->validateUserData($request->validated());
        $this->updateUser($id, $validatedData);
        $this->updateUserRoles($id, $validatedData['roles']);

        return redirect()->route('users.index')->with('success', 'تم تعديل المستخدم بنجاح');
    }


    /*
        It checks if the password is present in the data.
        If the password is present, it hashes it using Hash::make().
        If no password is present, it removes the password field from the data.
        Returns the validated and manipulated user data.
    */
    public function validateUserData($data)
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data = Arr::except($data, ['password']);
        }
        return $data;
    }

    public function updateUser($id, $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
    }


    public function deleteExistingUserRoles($id)
    {
        DB::table('model_has_roles')->where('model_id', $id)->delete();
    }


    public function updateUserRoles($id, $roles)
    {
        $this->deleteExistingUserRoles($id);
        $user = User::findOrFail($id);
        $user->assignRole($roles);
    }


    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success','تم حذف المستخدم بنجاح');
    }
}
