<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\slider\SliderStoreRequest;
use App\Http\Requests\slider\SliderUpdateRequest;
use App\Models\Slider;
use App\Repositories\Interfaces\AdminDashboard\SliderInterface;

class SliderController extends Controller
{
    protected $slider;
    public function __construct(SliderInterface $slider)
    {
        $this->slider = $slider;
        $this->middleware('checkAdminRole');
    }
    public function index()
    {
        return $this->slider->index();
    }
    public function store(SliderStoreRequest $request)
    {
        return $this->slider->store($request->validated());
    }

    public function update(SliderUpdateRequest $request, Slider $slider)
    {
        return $this->slider->update($request->validated(),$slider);
    }
    public function destroy(Slider $slider)
    {
        return $this->slider->destroy($slider);
    }
}
