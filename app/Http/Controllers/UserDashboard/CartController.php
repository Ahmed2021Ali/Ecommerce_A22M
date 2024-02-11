<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\cart\CartStoreRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Interfaces\UserDashboard\CartInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    protected $cart;
    public function __construct(CartInterface $cart)
    {
        $this->cart = $cart;
        $this->middleware('auth');

    }

    public function index()
    {
        return $this->cart->index();
    }

    public function store(CartStoreRequest $request ,Product $product)
    {
       return $this->cart->store($request->validated(),$product);
    }

    public function update(CartStoreRequest $request,Cart $cart)
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
