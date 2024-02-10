<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\color\ColorStoreRequest;
use App\Models\Color;
use PhpParser\Node\Stmt\Return_;

class ColorController extends Controller
{

    public function index()
    {
        return view('adminDashboard.color.index',['colors'=>Color::paginate(10)]);
    }
    public function store(ColorStoreRequest $request)
    {
        Color::create($request->validated());
        return redirect()->back()->with('success','تم اضافة اللون بنجاح');
    }
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->back()->with('success','تم اضافة اللون بنجاح');
    }
}
