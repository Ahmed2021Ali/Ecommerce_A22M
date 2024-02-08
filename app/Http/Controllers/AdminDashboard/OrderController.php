<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AdminDashboard\OrderInterface;

class OrderController extends Controller
{
    protected $order;
    public function __construct(OrderInterface $order)
    {
        $this->order = $order;
    }
   public function index()
   {
       return $this->order->index();
   }
}
