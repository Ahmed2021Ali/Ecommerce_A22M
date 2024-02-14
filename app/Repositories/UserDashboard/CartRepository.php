<?php

namespace App\Repositories\UserDashboard;

use App\Models\Cart;
use App\Repositories\Interfaces\UserDashboard\CartInterface;
use Illuminate\Support\Facades\Auth;


class CartRepository implements CartInterface
{

    public function index()
    {
        return view('userDashboard.cart.index', ['carts' => Auth::user()->carts()]);
    }

    public function store($request, $product)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $product->id)
            ->where('color', isset($request['color']) ?? null)->where('size', isset($request['size']) ?? null)->first();
        if ($cart) {
            $cart->quantity += $request['quantity'];
            if ($cart->quantity > $product->quantity) {
                return redirect()->back()->with('error', 'الكمية غير متوفره');
            }
            $cart->save();
            return redirect()->back()->with('success', 'تم زيادة العدد المطلوب لهذا المنتج');
        }
        if ($request['quantity'] > $product->quantity) {
            return redirect()->back()->with('error', 'الكمية غير متوفره');
        }
        Cart::create(['user_id' => Auth::user()->id, 'product_id' => $product->id,
            'quantity' => $request['quantity'], 'color' => isset($request['color']) ?? null, 'size' => isset($request['size']) ?? null]);
        return redirect()->back()->with('success', 'تم بنجاح اضافة المنتج الي عربة التسويق الخاص بك');
    }


    public function update($request, $cart)
    {
        if ($request['quantity'] > $cart->product->quantity) {
            return redirect()->back()->with('error', 'الكمية غير متوفره');
        } else {
            $cart->quantity = $request['quantity'];
            $cart->save();
            return redirect()->back()->with('success', 'تم زيادة العدد المطلوب لهذا المنتج');
        }
    }


    public function destroy($cart)
    {
        $cart->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف المنتج من المفضلة']);
    }

    public function clear()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($carts as $cart) {
            $cart->delete();
        }
        return redirect()->back()->with(['success' => ' تم بنجاح حذف المنتجات من المفضلة']);
    }

}
