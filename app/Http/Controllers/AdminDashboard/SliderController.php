<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\slider\SliderRequest;
use App\Http\Requests\slider\SliderUpdateRequest;
use App\Models\Slider;
use App\Repositories\Interfaces\AdminDashboard\SliderInterface;

class SliderController extends Controller
{
    protected $slider;
    public function __construct(SliderInterface $slider)
    {
        $this->middleware('permission:اسلايدر', ['only' => ['index']]);
        $this->middleware('permission:اضافة اسلايدر', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل اسلايدر', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف اسلايدر', ['only' => ['destroy']]);

        $this->slider = $slider;
        $this->middleware(['checkAdminRole','throttle:45,1']);
    }
    public function index()
    {
        return $this->slider->index();
    }
    public function store(SliderRequest $request)
    {
        return $this->slider->store($request->validated());
    }

    public function update(SliderRequest $request, Slider $slider)
    {
        return $this->slider->update($request->validated(),$slider);
    }
    public function destroy(Slider $slider)
    {
        return $this->slider->destroy($slider);
    }
}
