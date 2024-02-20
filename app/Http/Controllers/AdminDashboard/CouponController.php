<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\coupon\CouponRequest;
use App\Models\Coupon;
use App\Repositories\Interfaces\AdminDashboard\CouponInterface;

class CouponController extends Controller
{
    protected $coupon;
    public function __construct(CouponInterface $coupon)
    {
        $this->middleware('permission:الكوبونات', ['only' => ['index']]);
        $this->middleware('permission:اضافة كوبون', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل كوبون', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف كوبون', ['only' => ['destroy']]);

        $this->coupon = $coupon;
        $this->middleware('checkAdminRole');
    }
    public function index()
    {
        return $this->coupon->index();
    }
    public function store(CouponRequest $request)
    {
        return $this->coupon->store($request->validated());
    }

    public function update(CouponRequest $request, Coupon $coupon)
    {
        return $this->coupon->update($request->validated(),$coupon);
    }
    public function destroy(Coupon $coupon)
    {
        return $this->coupon->destroy($coupon);
    }
}
