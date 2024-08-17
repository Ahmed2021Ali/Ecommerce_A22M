<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Repositories\Interfaces\UserDashboard\ProductInterface;

class ProductController extends Controller
{

    protected $product;

    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return $this->product->index();
    }

    public function show($id)
    {
        return $this->product->show(Product::findOrFail(decrypt($id)));
    }

    public function productsOfSubCategory($subCategory_id)
    {
        return $this->product->productsOfSubCategory(SubCategory::findOrFail(decrypt($subCategory_id)));
    }
    public function productsOfCategory($category_id)
    {
        return $this->product->productsOfCategory(Category::findOrFail(decrypt($category_id)));
    }


}
