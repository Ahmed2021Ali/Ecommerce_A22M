<?php

namespace App\Repositories\UserDashboard;

use App\Repositories\Interfaces\UserDashboard\ProductInterface;
use App\Models\Category;
use App\Models\Product;

class ProductRepository implements ProductInterface
{

    public function index()
    {
        return view('userDashboard.products.index', ['products' => Product::select('id','price','name','offer','price_after_offer')->where('status',1)->paginate(9)]);
    }

    public function show($product)
    {
        return view('userDashboard.products.productDetails', ['product' => $product]);
    }

    public function productsOfSubCategory($subCategory)
    {
        return view('userDashboard.products.index', ['subCategory' => $subCategory,'products' => $subCategory->products()]);
    }

    public function productsOfCategory($category)
    {
        return view('userDashboard.productsCategory.index', ['category' => $category]);
    }
}
