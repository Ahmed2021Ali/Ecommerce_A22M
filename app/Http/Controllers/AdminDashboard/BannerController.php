<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Requests\banner\BannerStoreRequest;
use App\Http\Requests\banner\BannerUpdateRequest;
use App\Models\Banner;
use App\Repositories\Interfaces\AdminDashboard\BannerInterface;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    protected $banner;
    public function __construct(BannerInterface $banner)
    {
        $this->banner = $banner;
        $this->middleware('checkAdminRole');
    }
    public function index()
    {
        return $this->banner->index();
    }
    public function store(BannerStoreRequest $request)
    {
        return $this->banner->store($request->validated());
    }

    public function update(BannerUpdateRequest $request, Banner $banner)
    {
        return $this->banner->update($request->validated(),$banner);
    }
    public function destroy(Banner $banner)
    {
        return $this->banner->destroy($banner);
    }
}
