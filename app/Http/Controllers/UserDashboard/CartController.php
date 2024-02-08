<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Interfaces\UserDashboard\CartInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{

    protected $cat;
    public function __construct(CartInterface $cat)
    {
        $this->cat = $cat;
    }

    public function index()
    {
        $this->cat->index();
    }
    public function store(Request $request ,Product $product)
    {
        $this->cat->store($request,$product);
    }

    public function update(Request $request,Cart $cart)
    {
        $this->cat->update($request,$cart);
    }

    public function destroy(Cart $cart)
    {
        $this->cat->destroy($cart);
    }
}
