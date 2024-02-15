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
        return $this->profile->update($request);
    }
    

    public function deleteUserImage()
    {
        return $this->profile->deleteUserImage();
    }


}
