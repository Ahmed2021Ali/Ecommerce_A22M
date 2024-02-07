<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Brand;
use App\Models\Slider;
use App\Repositories\Interfaces\AdminDashboard\BrandInterface;
use Illuminate\Support\Arr;

class BrandRepository implements BrandInterface
{

    public function index()
    {
        return view('adminDashboard.brand.index', ['brands' => Brand::paginate(10)]);
    }

    public function store($request)
    {
        $brand = Brand::create([...Arr::except($request, 'files')]);
        uploadFiles($request['files'], $brand, 'brandFiles');
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة البرند']);
    }


    public function update($request, $brand)
    {
        $brand->update([...Arr::except($request, 'files')]);
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
