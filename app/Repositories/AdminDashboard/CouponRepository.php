<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Coupon;
use App\Repositories\Interfaces\AdminDashboard\CouponInterface;

class CouponRepository implements CouponInterface
{

    public function index()
    {
        return view('adminDashboard.coupon.index', ['coupons' => Coupon::select('id','name','value','status')->latest()->paginate(10)]);
    }

    public function store($request)
    {
        Coupon::create($request);
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة الكوبون']);
    }

    public function update($request, $coupon)
    {
        $coupon->update($request);
        return redirect()->back()->with(['success' => ' تم بنجاح تحديث الكوبون']);
    }

    public function destroy($coupon)
    {
        $coupon->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف بانر']);
    }

}
