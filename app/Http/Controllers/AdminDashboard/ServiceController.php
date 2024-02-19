<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\service\ServiceRequest;
use App\Http\Requests\service\ServiceUpdateRequest;
use App\Models\Service;
use App\Repositories\Interfaces\AdminDashboard\ServiceInterface;

class ServiceController extends Controller
{
    protected $service;
    public function __construct(ServiceInterface $service)
    {
        $this->middleware('permission:الخدمات', ['only' => ['index']]);
        $this->middleware('permission:اضافة خدمة', ['only' => ['cretae', 'store']]);
        $this->middleware('permission:تعديل خدمة', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف خدمة', ['only' => ['destroy']]);

        $this->service = $service;
        $this->middleware('checkAdminRole');
    }
    public function index()
    {
        return $this->service->index();
    }
    public function store(ServiceRequest $request)
    {
        return $this->service->store($request->validated());
    }

    public function update(ServiceRequest $request, Service $service)
    {
        return $this->service->update($request->validated(),$service);
    }
    public function destroy(Service $service)
    {
        return $this->service->destroy($service);
    }
}
