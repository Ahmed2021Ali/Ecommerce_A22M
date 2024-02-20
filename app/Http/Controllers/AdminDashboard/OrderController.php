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
        $this->middleware('permission:الأوردارات', ['only' => ['index']]);
        $this->middleware('permission:اوردارات تم توصيلها', ['only' => ['ordersDone']]);
        $this->middleware('permission:اوردارات لم يتم توصيلها', ['only' => ['index']]);
        $this->middleware('permission:اوردارات تم إلغائها', ['only' => ['ordersCancelled']]);
        $this->middleware('permission:تأكيد توصيل الأوردر', ['only' => ['deliveryStatus']]);

        $this->order = $order;
        $this->middleware(['checkAdminRole','throttle:60,1']);
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
    public function destroy($order)
    {
        return $this->order->destroy(OrderDetails::withTrashed()->find($order));
    }
}
