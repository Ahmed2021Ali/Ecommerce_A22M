<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
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

    public function show($order_number)
    {
        return $this->order->show($order_number);
    }

    public function destroy(OrderDetails $order)
    {
        return $this->order->destroy($order);
    }
    public function search(Request $request)
    {
        return $this->order->search($request->order_number);
    }
}
