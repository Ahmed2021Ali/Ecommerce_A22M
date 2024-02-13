<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Interfaces\UserDashboard\ProductInterface;

class ProductController extends Controller
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

    public function show($id)
    {
        return $this->product->show(Product::find(decrypt($id)));
    }


    public function productsOfCategory($categoryId)
    {
        return $this->product->productsOfCategory(decrypt($categoryId));        
    }


}
