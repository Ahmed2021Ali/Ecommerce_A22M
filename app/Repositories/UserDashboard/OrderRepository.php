<?php

namespace App\Repositories\UserDashboard;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Repositories\Interfaces\UserDashboard\OrderInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderRepository implements OrderInterface
{

    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(5);
        //  return view('user.favourites.index', compact('orders'));
    }

    public function show($order_number)
    {
        return view('userDashboard.checkout.index', [
            'orders' => Order::where('order_number', $order_number)->get(),
            'detailsOrder' => OrderDetails::where('order_number', $order_number)->first(),
        ]);
    }

    public function destroy($order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'تم بنجاح حذف الطلب');
    }

}
