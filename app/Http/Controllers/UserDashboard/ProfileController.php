<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileRequest;
use App\Repositories\Interfaces\UserDashboard\ProfileInterace;


class ProfileController extends Controller
{

    protected $profile;

    public function __construct(ProfileInterace $profile)
    {
        $this->profile = $profile;
        $this->middleware('auth');
    }


    public function index()
    {
        return $this->profile->index();
    }


    public function update(ProfileRequest $request)
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
            if (isset($request['files'])) {
                updateFiles($request['files'], $user, 'userImages');
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
