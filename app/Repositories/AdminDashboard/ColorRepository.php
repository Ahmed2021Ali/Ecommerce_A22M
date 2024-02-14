<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Color;
use App\Repositories\Interfaces\AdminDashboard\ColorInterface;

class ColorRepository implements ColorInterface
{

    public function index()
    {
        return view('adminDashboard.color.index',['colors' => Color::paginate(10)]);
    }
    public function store($request)
    {
        Color::create([...$request]);
        return redirect()->back()->with('success','تم اضافة اللون بنجاح');
    }
    public function update($request, $color)
    {
        $color->update([...$request]);
        return redirect()->back()->with('success','تم اضافة اللون بنجاح');
    }
    public function destroy($color)
    {
        $color->delete();
        return redirect()->back()->with('success','تم اضافة اللون بنجاح');
    }

}
