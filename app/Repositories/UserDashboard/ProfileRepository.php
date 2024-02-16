<?php

namespace App\Repositories\UserDashboard;

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

            $this->handlePasswordUpdate($request, $validatedData);

            $this->handleFileUploads($request);

            $updateResult = Auth::user()->update($validatedData);

            if ($updateResult) {
                return back()->with(['success' => 'تم تحديث البيانات بنجاح']);
            } else {
                return back()->with(['error' => 'حدث خطأ أثناء تحديث البيانات']);
        }

        } catch (\Exception $e) {
            return toastr()->error($e->getMessage());
        }
    }

    protected function handlePasswordUpdate($request, $validatedData)
    {
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }
    }

    protected function handleFileUploads($request)
    {
        if ($request->hasFile('files')) {
            $this->updateUserFiles($request->file('files'), Auth::user(), 'userImages');
        }
    }


    protected function updateUserFiles($files, $user, $directory)
    {
        try {
            updateFiles($files, $user, $directory);
        } catch (\Exception $e) {
            throw new \Exception('حدث خطأ أثناء تحديث الصور.', 0, $e);
        }
    }





    public function deleteUserImage()
    {
        $media = Auth::user()->getMedia('userImages')->first();

        if ($media) {
            $media->delete();
            return back()->with(['success' => 'تم حذف الصورة الشخصية بنجاح']);
        } else {
            return redirect()->back()->with('error', 'حدث خطأ ما!');
        }
    }



}
