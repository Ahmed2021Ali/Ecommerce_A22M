<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\cart\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Interfaces\UserDashboard\CartInterface;


class CartController extends Controller
{

    protected $cart;
    public function __construct(CartInterface $cart)
    {
        $this->cart = $cart;
        $this->middleware('auth');

    }

    public function store(CartRequest $request ,Product $product)
    {
        return $this->cart->store($request->validated(),$product);
    }

    public function update(CartRequest $request,Cart $cart)
    {
        return $this->cart->update($request->validated(),$cart);
    }

    public function destroy(Cart $cart)
    {
        return $this->cart->destroy($cart);
    }
    public function clear()
    {
        return  $this->cart->clear();
    }
}
