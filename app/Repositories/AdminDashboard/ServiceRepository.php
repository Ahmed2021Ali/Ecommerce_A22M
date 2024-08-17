<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Service;
use App\Repositories\Interfaces\AdminDashboard\ServiceInterface;
class ServiceRepository implements ServiceInterface
{

    public function index()
    {
        return view('adminDashboard.service.index', ['services' => Service::select('id','name','status')->latest()->paginate(10)]);
    }

    public function store($request)
    {
        $service = Service::create(['name'=>$request['name'],'status'=>$request['status']]);
        uploadFiles($request['files'], $service, 'serviceFiles');
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة الخدمة']);
    }


    public function update($request, $service)
    {
        $service->update(['name'=>$request['name'],'status'=>$request['status']]);
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
