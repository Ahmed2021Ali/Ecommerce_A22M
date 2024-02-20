<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Banner;
use App\Repositories\Interfaces\AdminDashboard\BannerInterface;
use App\Repositories\Interfaces\AdminDashboard\SliderInterface;
use Illuminate\Support\Arr;
use App\Models\Product;
class BannerRepository implements BannerInterface
{

    public function index()
    {
        $products = Product::select('id', 'name')->get();
        return view('adminDashboard.banner.index', ['banners' => Banner::latest()->paginate(10), 'products' => $products]);
    }

    public function store($request)
    {
        $banner = Banner::create([...$request]);
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة بانر']);
    }

    public function update($request, $banner)
    {
        $banner->update([...$request]);
        return redirect()->back()->with(['success' => ' تم بنجاح تحديث بانر']);
    }

    public function destroy($banner)
    {
        $banner->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف بانر']);
    }

}
