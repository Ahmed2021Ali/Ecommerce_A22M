<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Color;
use App\Models\Product;
use App\Repositories\Interfaces\AdminDashboard\ColorInterface;

class ColorRepository implements ColorInterface
{

    public function index()
    {
        return view('adminDashboard.color.index',['colors' => Color::select('id','name','value')->paginate(10)]);
    }
    public function store($request)
    {
        Color::create($request);
        return redirect()->back()->with('success','تم اضافة اللون بنجاح');
    }
    public function update($request, $color)
    {
        $color->update($request);
        return redirect()->back()->with('success','تم اضافة اللون بنجاح');
    }
    public function destroy($color)
    {
        $products = Product::all();
        foreach ($products as $product) {
            if($product->color === $color->value) {
                $product->delete();
            }
        }
        $color->delete();
        return redirect()->back()->with('success','تم اضافة اللون بنجاح');
    }

}
