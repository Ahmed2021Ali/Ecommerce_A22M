<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\StoreProductRequest;
use App\Http\Requests\product\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\Interfaces\AdminDashboard\ProductInterface;

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

    public function create()
    {
        return $this->product->create();
    }

    public function store(StoreProductRequest $request)
    {
        return $this->product->store($request->validated());
    }

    public function edit(product $product)
    {
        return $this->product->edit($product);
    }

    public function update(UpdateProductRequest $request, product $product)
    {

        return $this->product->update($request->validated(),$product);
    }

    public function destroy(product $product)
    {
        return $this->product->destroy($product);
    }

}
