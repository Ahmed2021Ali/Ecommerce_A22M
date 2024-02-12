<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserDashboard\ProfileInterace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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


    public function deleteUserImage()
    {
        // Get the authenticated user
        $user = Auth::user();
    
        // Check if the user has an image
        if ($user->hasMedia('userImages')) {
            // Delete the user's image (assuming the user has only one image)
            $user->clearMediaCollection('userImages');
    
            toastr()->success('تم حذف الصورة الشخصية بنجاح');
            return redirect()->back();
        } else {
            // Handle the case where the user has no image
            return redirect()->back()->with('error', 'No image to delete');
        }
    }
    


    public function viewImage($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            abort(404); // Or handle accordingly
        }
    
        $mediaItem = $user->getFirstMedia('userImages');
    
        if (!$mediaItem) {
            abort(404); // Or handle accordingly
        }
    
        $imagePath = public_path("storage/{$mediaItem->id}/{$mediaItem->file_name}");
    
        return response()->file($imagePath);
    }
    


}
