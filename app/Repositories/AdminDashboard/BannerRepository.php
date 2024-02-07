<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Banner;
use App\Repositories\Interfaces\AdminDashboard\BannerInterface;
use App\Repositories\Interfaces\AdminDashboard\SliderInterface;
use Illuminate\Support\Arr;

class BannerRepository implements BannerInterface
{

    public function index()
    {
        return view('adminDashboard.banner.index', ['banners' => Banner::paginate(10)]);
    }

    public function store($request)
    {
        $banner = Banner::create([...Arr::except($request, 'files')]);
        uploadFiles($request['files'], $banner, 'bannerFiles');
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة بانر']);
    }

    public function update($request, $banner)
    {
        $banner->update([...Arr::except($request, 'files')]);
        if (isset($request['files'])) {
            updateFiles($request['files'], $banner, 'bannerFiles');
        }
        return redirect()->back()->with(['success' => ' تم بنجاح تحديث بانر']);
    }

    public function destroy($banner)
    {
        $banner->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف بانر']);
    }

}
