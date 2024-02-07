<?php

namespace App\Repositories\Interfaces\AdminDashboard;

interface CouponInterface {

    public function index();

    public function store($request);

    public function update($request ,$coupon);

    public function destroy($coupon);


}
