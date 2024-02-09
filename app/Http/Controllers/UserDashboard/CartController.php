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

    protected $cat;
    public function __construct(CartInterface $cat)
    {
        $this->cat = $cat;
        //$this->middleware('auth');

    }

    public function index()
    {
        //return view('userDashboard.cart.index', ['carts' => Cart::where('user_id', Auth::user()->id)->paginate(6)]);

        return $this->cat->index();
    }

    public function store(CartStoreRequest $request ,Product $product)
    {
       return $this->cat->store($request->validated(),$product);
    }

    public function update(CartStoreRequest $request,Cart $cart)
    {
        return $this->cat->update($request->validated(),$cart);
    }

    public function destroy(Cart $cart)
    {
        return $this->cat->destroy($cart);
    }
    public function clear()
    {
        return  $this->cat->clear();
    }
}
