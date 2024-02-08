<?php

namespace App\Repositories\UserDashboard;

use App\Models\Address;
use App\Models\Cart;
use App\Repositories\Interfaces\UserDashboard\AddressInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class AddressRepository implements AddressInterface
{

    public function index()
    {
        $address = Address::where('user_id', Auth::user()->id)->paginate(5);
        //   return view('user.favourites.index', compact('address'));
    }

    public function create()
    {
        //   return view('user.favourites.index');
    }

    public function store($request)
    {
        Address::create([$request, 'user_id' => Auth::user()->id]);
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة العنوان']);
    }

    public function edit($address)
    {
        //   return view('user.favourites.index',['address' => $address]);
    }

    public function update($request, $address)
    {
        $address->update([$request, 'user_id' => Auth::user()->id]);
        return redirect()->back()->with(['success' => ' تم بنجاح تحديث العنوان']);
    }

    public function destroy($address)
    {
        $address->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف العنوان ']);
    }

}
