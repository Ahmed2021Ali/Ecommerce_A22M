<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\coupon\CouponStoreRequest;
use App\Http\Requests\coupon\CouponUpdateRequest;
use App\Models\Coupon;
use App\Repositories\Interfaces\AdminDashboard\CouponInterface;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    protected $coupon;
    public function __construct(CouponInterface $coupon)
    {
        $this->copon = $coupon;
    }
    public function index()
    {
        return $this->copon->index();
    }
    public function store(CouponStoreRequest $request)
    {
        return $this->copon->store($request->validated());
    }

    public function update(CouponUpdateRequest $request, Coupon $coupon)
    {
        return $this->copon->update($request->validated(),$coupon);
    }
    public function destroy(Coupon $coupon)
    {
        return $this->copon->destroy($coupon);
    }
}
