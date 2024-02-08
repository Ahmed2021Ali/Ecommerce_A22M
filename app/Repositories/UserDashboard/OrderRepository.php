<?php

namespace App\Repositories\UserDashboard;

use App\Models\Cart;
use App\Models\Order;
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

    public function store($request ,$product)
    {
/*        $order_number = Str::random(16);
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($carts as $cart) {
            $order = Arr::except($cart->toArray());
            $order['order_number'] = $order_number;
            //$order['address_id'] = $address->id;
            $order['price'] = $cart->product->price;
            $order['offer'] = $cart->product->offer;
            $order['price_after_offer'] = $cart->product->offer ? $cart->product->price_after_offer : $cart->product->price;
            $order['total_price'] = ($order['offer'] ? $order['price_after_offer'] : $order['price']) * $cart->quantity;
            Order::create($order);
            Product::where('id', $cart->product_id)->update([
                'quantity' => ($cart->product->quantity) - ($cart->quantity),
                'stock' => 1 + $cart->product->stock,
            ]);
            $cart->delete();
        }*/
        // Send mail for admin


       // return $order_number;
    }

    public function destroy($order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'تم بنجاح حذف الطلب');
    }

}
