<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\size;
use App\Repositories\Interfaces\AdminDashboard\ProductInterface;
use Illuminate\Support\Arr;

class ProductRepository implements ProductInterface
{


    public function index()
    {
        return view('adminDashboard.products.index', ['products' => Product::paginate(10)]);
    }

    public function create()
    {
        return view('adminDashboard.products.create', ['categories' => Category::all()]);
    }

    public function store($request)
    {
        $product = Product::create([...Arr::except($request, 'files'), 'price_after_offer' => priceAfterOffer($request['price'], $request['offer'])]);
        uploadFiles($request['files'], $product, 'productFiles');
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة المنتج']);
    }

    public function edit($product)
    {
        return view('adminDashboard.products.edit', ['categories' => Category::all(), 'product' => $product]);
    }

    public function update($request, $product)
    {
        $product->update([...Arr::except($request, 'files'), 'price_after_offer' => priceAfterOffer($request['price'], $request['offer'])]);
        updateFiles($request['files'], $product, 'productFiles');
        return redirect()->back()->with(['success' => 'تم بنجاح تحديث المنتج ']);
    }

    /*    public function show(Product $product)
        {
            return view('admin.products.show', ['opinions' => $product->opinions]);
        }*/

    public function destroy($product)
    {
        $product->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف المنتج']);
    }
}
