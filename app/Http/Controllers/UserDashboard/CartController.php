<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\cart\CartStoreRequest;
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
    
    public function store(CartStoreRequest $request ,Product $product)
    {
        $this->cat->store($request->validated(),$product);
    }

    public function update(CartStoreRequest $request,Cart $cart)
    {
        $this->cat->update($request->validated(),$cart);
    }

    public function destroy(Cart $cart)
    {
        $this->cat->destroy($cart);
    }
}
