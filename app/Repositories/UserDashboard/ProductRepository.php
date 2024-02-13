<?php

namespace App\Repositories\UserDashboard;

use App\Repositories\Interfaces\UserDashboard\ProductInterface;
use App\Models\Category;
use App\Models\Product;

class ProductRepository implements ProductInterface
{


    public function index()
    {
        return view('userDashboard.products.index', ['products' => Product::paginate(9)]);
    }

    public function show($product)
    {
        return view('userDashboard.products.productDetails', ['product' => $product]);
    }

    public function productsOfCategory($category)
    {
        return view('userDashboard.products.index', ['category' => $category, 'products' => $category->products()]);
    }

}
