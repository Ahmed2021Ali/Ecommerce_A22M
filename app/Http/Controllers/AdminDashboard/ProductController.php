<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\ProductRequest;
use App\Http\Requests\product\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\Interfaces\AdminDashboard\ProductInterface;

class ProductController extends Controller
{

    protected $product;

    public function __construct(ProductInterface $product)
    {
        $this->middleware(['checkAdminRole'] );
        $this->middleware('permission:المنتجات',  ['only' => ['index']]);
        $this->middleware('permission:اضافة منتج', ['only' => ['cretae' , 'store']]);
        $this->middleware('permission:تعديل منتج', ['only' => ['edit' , 'update']]);
        $this->middleware('permission:حذف منتج', ['only' => ['destroy']]);
        $this->middleware('permission:تقييمات المنتج', ['only' => ['show']]);

        $this->product = $product;
        $this->middleware('checkAdminRole');
    }

    public function index()
    {
        return $this->product->index();
    }

    public function create()
    {
        return $this->product->create();
    }

    public function store(ProductRequest $request)
    {
        return $this->product->store($request->validated());
    }
    public function show(product $product)
    {
        return $this->product->show($product);
    }

    public function edit(product $product)
    {
        return $this->product->edit($product);
    }

    public function update(ProductRequest $request, product $product)
    {
        return $this->product->update($request->validated(),$product);
    }

    public function destroy(product $product)
    {
        return $this->product->destroy($product);
    }

}
