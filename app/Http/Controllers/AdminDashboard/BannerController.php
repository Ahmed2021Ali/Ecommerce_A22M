<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Requests\banner\BannerRequest;
use App\Http\Requests\banner\BannerUpdateRequest;
use App\Models\Banner;
use App\Repositories\Interfaces\AdminDashboard\BannerInterface;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    protected $banner;
    public function __construct(BannerInterface $banner)
    {
        $this->middleware('permission:بانر', ['only' => ['index']]);
        $this->middleware('permission:اضافة بانر', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل بانر', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف بانر', ['only' => ['destroy']]);

        $this->banner = $banner;
        $this->middleware(['checkAdminRole','throttle:45,1']);
    }
    public function index()
    {
        return $this->banner->index();
    }
    public function store(BannerRequest $request)
    {
        return $this->banner->store($request->validated());
    }

    public function update(BannerRequest $request, Banner $banner)
    {
        return $this->banner->update($request->validated(),$banner);
    }
    public function destroy(Banner $banner)
    {
        return $this->banner->destroy($banner);
    }
}
