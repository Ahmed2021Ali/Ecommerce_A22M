<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Interfaces\UserDashboard\ProductInterface;

class ProductControlle extends Controller
{

    protected $product;

    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
        // $this->middleware('auth');
    }


    public function index()
    {
        return $this->product->index();
    }



    public function show(Product $product)
    {
        return $this->product->show($product);
    }


    public function productsOfCategory($categoryId)
    {
        return $this->product->show($categoryId);
    }


}
