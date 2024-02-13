<?php

namespace App\Repositories\UserDashboard;

use App\Repositories\Interfaces\UserDashboard\ProductInterface;
use App\Models\Category;
use App\Models\Product;

class ProductRepository implements ProductInterface
{


    public function index()
    {
        return view('userDashboard.products.index',['products'=>Product::paginate(9),
            'categories'=>Product::latest()->take(3)->get(), 'newProducts'=>Category::paginate(8)]);
    }

    public function show($product)
    {
        return view('userDashboard.products.productDetails', ['product' => $product,
            'categories' => Category::paginate(8), 'newProducts' => Product::latest()->take(3)->get()]);
    }


    public function productsOfCategory($categoryId)
    {
        $categoryId = Category::find($categoryId)->id;
        $products = Product::where('category_id', $categoryId)->paginate(9);
        $categories = Category::all();
        $newProducts = Product::latest()->take(3)->get();
        $relatedProducts = Product::where('category_id', $categoryId)->get();
        $categoryName = Category::where('id', $categoryId)->select('id', 'name')->first();
        return view('userDashboard.products.productsOfCategory.index', compact('products', 'categories', 'newProducts', 'relatedProducts', 'categoryName'));


    }

}
