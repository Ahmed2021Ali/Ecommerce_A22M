<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\coupon\CouponStoreRequest;
use App\Http\Requests\coupon\CouponUpdateRequest;
use App\Models\Coupon;
use App\Repositories\Interfaces\AdminDashboard\CouponInterface;

class CouponController extends Controller
{
    protected $coupon;
    public function __construct(CouponInterface $coupon)
    {
        $this->coupon = $coupon;
        $this->middleware('checkAdminRole');
    }
    public function index()
    {
        return $this->coupon->index();
    }
    public function store(CouponStoreRequest $request)
    {
        return $this->coupon->store($request->validated());
    }

    public function update(CouponUpdateRequest $request, Coupon $coupon)
    {
        return $this->coupon->update($request->validated(),$coupon);
    }
    public function destroy(Coupon $coupon)
    {
        return $this->coupon->destroy($coupon);
    }
}
