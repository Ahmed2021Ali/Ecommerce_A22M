<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Brand;
use App\Repositories\Interfaces\AdminDashboard\BrandInterface;


class BrandRepository implements BrandInterface
{

    public function index()
    {
        return view('adminDashboard.brand.index', ['brands' => Brand::latest()->paginate(10)]);
    }

    public function store($request)
    {
        $brand = Brand::create(['status'=>$request['status']]);
        uploadFiles($request['files'], $brand, 'brandFiles');
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة البرند']);
    }


    public function update($request, $brand)
    {
        $brand->update(['status'=>$request['status']]);
        if (isset($request['files'])) {
            updateFiles($request['files'], $brand, 'brandFiles');
        }
        return redirect()->back()->with(['success' => ' تم بنجاح تحديث البرند']);
    }

    public function destroy($brand)
    {
        $brand->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف البرند']);
    }

}
