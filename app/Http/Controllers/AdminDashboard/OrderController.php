<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use App\Repositories\Interfaces\AdminDashboard\OrderInterface;

class OrderController extends Controller
{
    protected $order;
    public function __construct(OrderInterface $order)
    {
        $this->order = $order;
        $this->middleware('checkAdminRole');
    }

   public function index()
   {
       return $this->order->index();
   }
   public function deliveryStatus(OrderDetails $order)
   {
       return $this->order->deliveryStatus($order);
   }
    public function ordersDone()
    {
        return $this->order->ordersDone();
    }

    public function ordersCancelled()
    {
        return $this->order->ordersCancelled();
    }
}
