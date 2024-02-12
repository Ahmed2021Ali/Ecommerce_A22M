<?php

namespace App\Repositories\UserDashboard;

use App\Models\User;
use App\Repositories\Interfaces\UserDashboard\ProfileInterace;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileRepository implements ProfileInterace
{


    public function index()
    {
        return view('userDashboard.profile.index');
    }


    public function update($request)
    {
        try {
            $validatedData = $request->validated();

            $user = User::find(Auth::id());

            if ($request->filled('password')) {
                $validatedData['password'] = Hash::make($request->password);
            } else {
                // Remove the password key from the validated data to avoid updating it with an empty value
                unset($validatedData['password']);
            }
            if (isset($request['profile_image'])) {
                $user->media()->delete();
                $user->addMedia($request['profile_image'])->toMediaCollection('userImages');
            }
            $updateResult = $user->update($validatedData);
            updateFiles($request['profile_image'], $user, 'userImages');

            if ($updateResult) {
                toastr()->success('تم تحديث البيانات بنجاح');
                return to_route('profile.index');
            } else {
                toastr()->error('لم يتم تحديث البيانات، حاول مرة أخرى.');
                return back()->withErrors([
                    'error' => 'لم يتم تحديث البيانات، حاول مرة أخرى.',
                ])->withInput($validatedData);

            }
        } catch (\Exception $e) {
            toastr()->error('حدث خطأ أثناء تحديث البيانات');
            return back()->withErrors(['error' => 'حدث خطأ أثناء تحديث البيانات']);
        }
    }

}
