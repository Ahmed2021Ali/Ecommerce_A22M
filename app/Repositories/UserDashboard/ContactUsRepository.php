<?php

namespace App\Repositories\UserDashboard;

use App\Models\ContactUs;
use App\Repositories\Interfaces\UserDashboard\ContactUsInterface;
use Illuminate\Support\Facades\Auth;


class ContactUsRepository implements ContactUsInterface
{

    public function index()
    {
        return view('userDashboard.contactUs.index');
    }

    public function store($request)
    {
        ContactUs::create([$request, 'user_id' => Auth::user()->id]);
        return redirect()->back()->with(['success' => 'سيتم التواصل معك في اقرب وقت']);
    }

}
