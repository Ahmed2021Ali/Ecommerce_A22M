<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Slider;
use App\Repositories\Interfaces\AdminDashboard\SliderInterface;
use Illuminate\Support\Arr;

class SliderRepository implements SliderInterface
{

    public function index()
    {
        return view('adminDashboard.slider.index', ['sliders' => Slider::latest()->paginate(10)]);
    }

    public function store($request)
    {
        $slider = Slider::create([...Arr::except($request, 'files')]);
        uploadFiles($request['files'], $slider, 'sliderFiles');
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة الاسليدر']);
    }


    public function update($request, $slider)
    {
        $slider->update([...Arr::except($request, 'files')]);
        if (isset($request['files'])) {
            updateFiles($request['files'], $slider, 'sliderFiles');
        }
        return redirect()->back()->with(['success' => ' تم بنجاح تحديث الاسليدر']);
    }

    public function destroy($slider)
    {
        $slider->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف الاسليدر']);
    }

}
