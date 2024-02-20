<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\cart\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Interfaces\UserDashboard\CartInterface;
use Illuminate\Http\Request;


class CartController extends Controller
{

    protected $cart;
    public function __construct(CartInterface $cart)
    {
        $this->cart = $cart;
    }
    public function index()
    {
        return $this->cart->index();
    }
    public function store(CartRequest $request ,Product $product)
    {
        return $this->cart->store($request->validated(),$product);
    }

    public function update(Request $request ,Cart $cart)
    {
        return $this->cart->update($request->validate(['quantity' => 'required|numeric|min:1|max:99']),$cart);
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
