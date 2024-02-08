<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Banner;
use App\Models\Order;
use App\Repositories\Interfaces\AdminDashboard\BannerInterface;
use App\Repositories\Interfaces\AdminDashboard\OrderInterface;
use App\Repositories\Interfaces\AdminDashboard\SliderInterface;
use Illuminate\Support\Arr;

class OrderRepository implements OrderInterface
{

    public function index()
    {
        return view('adminDashboard.order.index', ['orders' => Order::paginate(10)]);
    }

}
