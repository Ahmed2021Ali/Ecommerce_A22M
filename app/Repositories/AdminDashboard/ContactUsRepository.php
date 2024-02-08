<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Banner;
use App\Models\ContactUs;
use App\Repositories\Interfaces\AdminDashboard\BannerInterface;
use App\Repositories\Interfaces\AdminDashboard\ContactUsInterface;
use App\Repositories\Interfaces\AdminDashboard\SliderInterface;
use Illuminate\Support\Arr;

class ContactUsRepository implements ContactUsInterface
{

    public function index()
    {
        return view('adminDashboard.contactus.index', ['contacts' => ContactUs::paginate(10)]);
    }


    public function destroy($contact)
    {
        $contact->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح الحذف ']);
    }

}
