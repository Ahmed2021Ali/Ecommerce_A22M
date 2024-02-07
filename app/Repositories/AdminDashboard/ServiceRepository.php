<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Service;
use App\Repositories\Interfaces\AdminDashboard\ServiceInterface;
use Illuminate\Support\Arr;

class ServiceRepository implements ServiceInterface
{

    public function index()
    {
        return view('adminDashboard.service.index', ['services' => Service::paginate(10)]);
    }

    public function store($request)
    {
        $slider = Service::create([...Arr::except($request, 'files')]);
        uploadFiles($request['files'], $slider, 'serviceFiles');
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة الخدمة']);
    }


    public function update($request, $service)
    {
        $service->update([...Arr::except($request, 'files')]);
        if (isset($request['files'])) {
            updateFiles($request['files'], $service, 'serviceFiles');
        }
        return redirect()->back()->with(['success' => ' تم بنجاح تحديث الخدمة']);
    }

    public function destroy($service)
    {
        $service->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف الخدمة']);
    }

}
