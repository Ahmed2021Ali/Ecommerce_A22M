<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Size;
use App\Repositories\Interfaces\AdminDashboard\SizeInterface;

class SizeRepository implements SizeInterface
{

    public function index()
    {
        return view('adminDashboard.size.index', ['sizes' => Size::select('id', 'name')->paginate(8)]);
    }

    public function store($request)
    {
        Size::create([...$request]);
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة المفاس']);
    }

    public function update($request, $size)
    {
        $size->update([...$request]);
        return redirect()->back()->with(['success' => ' تم بنجاح تحديث المفاس']);
    }

    public function destroy($size)
    {
        $size->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف المفاس']);
    }

}
