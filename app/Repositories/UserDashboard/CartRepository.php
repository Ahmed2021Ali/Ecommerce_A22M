<?php

namespace App\Repositories\UserDashboard;

use App\Models\Cart;
use App\Repositories\Interfaces\UserDashboard\CartInterface;
use Illuminate\Support\Facades\Auth;


class CartRepository implements CartInterface
{

    public function index()
    {
           return view('userDashboard.fav.index', ['carts'=>Cart::where('user_id', Auth::user()->id)->all()]);
    }

    public function store($request ,$product)
    {
        dd($request,$product);
        $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $product->id)
            ->where('color', $request['color'])->where('size', $request['size'])->first();
        if ($cart) {
            $cart->quantity += $request['quantity'];
            if ($cart->quantity > $product->quantity) {
                return redirect()->back()->with('error', 'الكمية غير متوفره');
            } else {
                $cart->save();
                return redirect()->back()->with('success', 'تم زيادة العدد المطلوب لهذا المنتج');
            }
        } else {
            if ($request['quantity'] > $product->quantity) {
                return redirect()->back()->with('error', 'الكمية غير متوفره');
            } else {
                Cart::create(['user_id' => Auth::user()->id,'product_id' => $product->id,
                    'quantity' => $request['quantity'],'color' => $request['color'], 'size' => $request['size']]);
                return redirect()->back()->with('success', 'تم بنجاح اضافة المنتج الي عربة التسويق الخاص بك');
            }
        }
    }
    public function update($request ,$cart)
    {
        $cart->quantity += $request['quantity'];
        if ($cart->quantity > $cart->product->quantity) {
            return redirect()->back()->with('error', 'الكمية غير متوفره');
        } else {
            $cart->save();
            return redirect()->back()->with('success', 'تم زيادة العدد المطلوب لهذا المنتج');
        }
    }

    public function destroy($cart)
    {
        $cart->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف المنتج من المفضلة']);
    }

}
