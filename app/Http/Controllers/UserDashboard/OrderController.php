<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use App\Repositories\Interfaces\UserDashboard\OrderInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order;
    public function __construct(OrderInterface $order)
    {
        $this->order = $order;
        $this->middleware('auth');

    }

    public function index()
    {
        return $this->order->index();
    }

    public function store(Request $request , Address $address)
    {
        return $this->order->store($request,$address);
    }

    public function destroy(Order $order)
    {
        return $this->order->destroy($order);
    }
}
