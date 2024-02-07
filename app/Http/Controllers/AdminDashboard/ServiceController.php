<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\service\ServiceStoreRequest;
use App\Http\Requests\service\ServiceUpdateRequest;
use App\Models\Service;
use App\Repositories\Interfaces\AdminDashboard\ServiceInterface;

class ServiceController extends Controller
{
    protected $service;
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        return $this->service->index();
    }
    public function store(ServiceStoreRequest $request)
    {
        return $this->service->store($request->validated());
    }

    public function update(ServiceUpdateRequest $request, Service $service)
    {
        return $this->service->update($request->validated(),$service);
    }
    public function destroy(Service $service)
    {
        return $this->service->destroy($service);
    }
}
