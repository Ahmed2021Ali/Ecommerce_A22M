<?php

namespace App\Repositories\UserDashboard;

use App\Models\Cart;
use App\Repositories\Interfaces\UserDashboard\CartInterface;
use Illuminate\Support\Facades\Auth;


class CartRepository implements CartInterface
{

    public function index()
    {
        return view('userDashboard.cart.index');
    }

    public function store($request, $product)
    {
        if ($this->valCart($product, $request)) {
            return $this->valCart($product, $request);
        }
        $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $product->id)
            ->where('color', $request['color'] ?? null)->where('size', $request['size'] ?? null)->first();
        if ($cart) {
            return $this->issetCart($product, $cart, $request);
        }
        return $this->notSetCart($product, $request);
    }

    public function update($request, $cart)
    {
        if ($request['quantity'] > $cart->product->quantity) {
            return redirect()->back()->with('error', 'الكمية غير متوفره');
        }
        $cart->update(['quantity' => $request['quantity']]);
        return redirect()->back()->with('success', 'تم زيادة العدد المطلوب لهذا المنتج');
    }

    public function destroy($cart)
    {
        $cart->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف المنتج من المفضلة']);
    }

    public function clear()
    {
        foreach (Auth::user()->carts() as $cart) {
            $cart->delete();
        }
        return redirect()->back()->with(['success' => ' تم بنجاح حذف المنتجات من المفضلة']);
    }

    //  Special for Store Function
    private function valCart($product, $request)
    {
        if ($product->color) {
            if (!isset($request['color'])) {
                return redirect()->back()->with('error', 'برجاء تحديد اللون  ');
            }
        }
        if ($product->size) {
            if (!isset($request['size'])) {
                return redirect()->back()->with('error', 'برجاء تحديد  المقاس ');
            }
        }
    }

    private function issetCart($product, $cart, $request)
    {
        $cart->quantity += $request['quantity'];
        if ($cart->quantity > $product->quantity) {
            return redirect()->back()->with('error', 'الكمية غير متوفره');
        }
        $cart->save();
        if ($request['button'] === 'addCart') {
            return redirect()->back()->with('success', 'تم زيادة العدد المطلوب لهذا المنتج');
        }
        return to_route('cart.index')->with('success', 'برجاء ادخال العنوان المراد التوصيل المنتج  الية ');
    }

    private function notSetCart($product, $request)
    {
        if ($request['quantity'] > $product->quantity) {
            return redirect()->back()->with('error', 'الكمية غير متوفره');
        }
        Cart::create(['user_id' => Auth::user()->id, 'product_id' => $product->id, 'quantity' => $request['quantity'],
            'color' => $request['color'] ?? null, 'size' => $request['size'] ?? null]);
        if ($request['button'] === 'addCart') {
            return redirect()->back()->with('success', 'تم بنجاح اضافة المنتج الي عربة التسويق الخاص بك');
        }
        return to_route('cart.index')->with('success', 'برجاء ادخال العنوان المراد التوصيل المنتج  الية ');
    }
}
