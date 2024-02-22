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

    }

    public function show($order)
    {
        return $this->order->show(OrderDetails::withTrashed()->findOrFail(decrypt($order)));
    }

    public function destroy($order)
    {
        return $this->order->destroy(OrderDetails::withTrashed()->findOrFail($order));
    }
    public function search(Request $request)
    {
        return $this->order->search($request->order_number);
    }
}
