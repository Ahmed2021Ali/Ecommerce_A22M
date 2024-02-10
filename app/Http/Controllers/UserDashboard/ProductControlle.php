<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductControlle extends Controller
{

    public function index()
    {
        $products = Product::paginate(6);
        $newProducts = Product::latest()->take(3)->get();
        $categories = Category::all();
        return view('userDashboard.products.index', compact('products', 'categories', 'newProducts'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Product $product)
    {
        $categories = Category::all();

        $currentCategoryId = $product->category_id;

        $newProducts = Product::latest()->take(3)->get();

        $relatedProducts = Product::where('category_id', $currentCategoryId)->where('id', '!=', $product->id)->get();

        return view('userDashboard.products.productDetails', compact('product', 'categories', 'newProducts', 'relatedProducts'));
    }


    public function productsOfCategory($categoryId)
    {
        $products = Product::where('category_id', $categoryId)->paginate(9);

        $categories = Category::all();

        $newProducts = Product::latest()->take(3)->get();

        $relatedProducts = Product::where('category_id', $categoryId)->get();

        $categoryName = Category::where('id', $categoryId)->select('id', 'name')->first();

        return view('userDashboard.products.productsOfCategory.index', compact('products', 'categories', 'newProducts', 'relatedProducts', 'categoryName'));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
