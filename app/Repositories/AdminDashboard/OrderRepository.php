<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Banner;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Repositories\Interfaces\AdminDashboard\BannerInterface;
use App\Repositories\Interfaces\AdminDashboard\OrderInterface;
use App\Repositories\Interfaces\AdminDashboard\SliderInterface;
use Illuminate\Support\Arr;

class OrderRepository implements OrderInterface
{

    public function index()
    {
        return view('adminDashboard.order.index', ['orders' => OrderDetails::where('delivery_status',0)->paginate(10)]);
    }
    public function deliveryStatus($order)
    {
        $order->delivery_status =1;
        $order->save();
        
        return redirect()->back()->with('success','تم توصيل الاوردر بنجاح');
    }
    public function ordersDone()
    {
        return view('adminDashboard.order.order_done', ['orders' => OrderDetails::where('delivery_status',1)->paginate(10)]);
    }
    public function ordersCancelled()
    {
        return view('adminDashboard.order.orderCancelled', ['orders' => OrderDetails::onlyTrashed()->paginate(10)]);
    }
    public function destroy($order)
    {
        Order::where('order_number',$order->order_number)->delete();
        $order->forceDelete();
        return redirect()->back()->with('success','تم حذف الاردر بنجاح');
    }
}
