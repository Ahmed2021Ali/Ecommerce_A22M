<?php

namespace App\Repositories\UserDashboard;

use App\Repositories\Interfaces\UserDashboard\ProductInterface;
use App\Models\Category;
use App\Models\Product;

class ProductRepository implements ProductInterface
{


    public function index()
    {
        $products = Product::paginate(9);
        $newProducts = Product::latest()->take(3)->get();
        $categories = Category::latest()->take(20)->get();
        return view('userDashboard.products.index', compact('products', 'categories', 'newProducts'));
    }


    public function show($product)
    {
<<<<<<< HEAD
        $categories = Category::latest()->take(20)->get();

=======
/*        $categories = Category::all();
>>>>>>> a5ed64cde35ccae1481c45b730bd2d546db57a2c
        $currentCategoryId = $product->category_id;
        $newProducts = Product::latest()->take(3)->get();
        $relatedProducts = Product::where('category_id', $currentCategoryId)->where('id', '!=', $product->id)->get();
        return view('userDashboard.products.productDetails', compact('product', 'categories', 'newProducts', 'relatedProducts'));*/
        return view('userDashboard.products.productDetails', ['product'=>$product,
            'categories'=>Category::paginate(8), 'newProducts'=>Product::latest()->take(3)->get()]);
    }


    public function productsOfCategory($categoryId)
    {
        $categoryId=Category::find($categoryId)->id;
        $products = Product::where('category_id', $categoryId)->paginate(9);
<<<<<<< HEAD

        $categories = Category::latest()->take(20)->get();

=======
        $categories = Category::all();
>>>>>>> a5ed64cde35ccae1481c45b730bd2d546db57a2c
        $newProducts = Product::latest()->take(3)->get();
        $relatedProducts = Product::where('category_id', $categoryId)->get();
        $categoryName = Category::where('id', $categoryId)->select('id', 'name')->first();
        return view('userDashboard.products.productsOfCategory.index', compact('products', 'categories', 'newProducts', 'relatedProducts', 'categoryName'));
    }

}
