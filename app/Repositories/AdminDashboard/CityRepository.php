<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Address;
use App\Models\AvailableCity;
use App\Repositories\Interfaces\AdminDashboard\CityInterface;
use Illuminate\Support\Facades\Auth;


class CityRepository implements CityInterface
{

    public function index()
    {
        return view('adminDashboard.city.index', ['cities'=>AvailableCity::latest()->paginate(10)]);
    }


    public function store($request)
    {
        AvailableCity::create([...$request]);
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة المحافظة ']);
    }

    public function update($request, $city)
    {
        $city->update($request);
        return redirect()->back()->with(['success' => ' تم بنجاح تحديث المحافظة']);
    }

    public function destroy($city)
    {
        $city->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف العنوان ']);
    }

}
