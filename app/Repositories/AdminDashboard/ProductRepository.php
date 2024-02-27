<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Repositories\Interfaces\AdminDashboard\ProductInterface;
use Illuminate\Support\Arr;

class ProductRepository implements ProductInterface
{


    public function index()
    {
        return view('adminDashboard.products.index', [
            'products' => Product::latest()->paginate(10)]);
    }

    public function create()
    {
        return view('adminDashboard.products.create', ['categories' => Category::all(),
            'colors' => Color::select('name', 'value')->get(),'sizes' =>Size::select('name')->get()]);
    }

    public function store($request)
    {
        $product = Product::create([...Arr::except($request, ['files', 'size', 'color']),
            'price_after_offer' => priceAfterOffer($request['price'], $request['offer']),
            'size' => isset($request['size']) ? implode(',', $request['size']) : null,
            'color' => isset($request['color']) ? implode(',', $request['color']) : null,
        ]);
        uploadFiles($request['files'], $product, 'productFiles');
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة المنتج']);
    }

    public function edit($product)
    {
        return view('adminDashboard.products.edit', ['categories' => Category::select('id','name')->get(), 'product' => $product,
            'colors' => Color::select('name', 'value')->get(),'sizes' =>Size::select('name')->get()]);
    }

    public function update($request, $product)
    {
        $product->update([...Arr::except($request, ['files', 'size', 'color']),
            'price_after_offer' => priceAfterOffer($request['price'], $request['offer']),
            'size' => isset($request['size']) ? implode(',', $request['size']) : null,
            'color' => isset($request['color']) ? implode(',', $request['color']) : null,
        ]);
        if (isset($request['files'])) {
            updateFiles($request['files'], $product, 'productFiles');
        }

        return redirect()->back()->with(['success' => 'تم بنجاح تحديث المنتج ']);
    }

    public function show($product)
    {
        return view('adminDashboard.products.show', ['reviews' => $product->reviews()]);
    }

    public function destroy($product)
    {
        $product->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف المنتج']);
    }
}
