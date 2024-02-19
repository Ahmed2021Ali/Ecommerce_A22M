<?php

namespace App\Http\Controllers\AdminDashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleRequest;
use App\Repositories\Interfaces\AdminDashboard\RoleInterface;

class RoleController extends Controller
{


    private $roleRepository;

    public function __construct(RoleInterface $roleRepository) {
    $this->middleware(['checkAdminRole','throttle:45,1']);
    $this->middleware('permission:نوع المستخدم', ['only' => ['index']]);
    $this->middleware('permission:اضافة نوع مستخدم', ['only' => ['create','store']]);
    $this->middleware('permission:تعديل نوع مستخدم', ['only' => ['edit','update']]);
    $this->middleware('permission:حذف نوع مستخدم', ['only' => ['destroy']]);
    $this->middleware('permission:عرض نوع مستخدم', ['only' => ['show']]);

    $this->roleRepository = $roleRepository;

    }


    public function index(Request $request)
    {
        return $this->roleRepository->index($request);
    }


    public function create()
    {
        return $this->roleRepository->create();
    }


    public function store(RoleRequest $request)
    {
        return $this->roleRepository->store($request);
    }    


    public function show($id)
    {
        return $this->roleRepository->show($id);
    }


    public function edit($id)
    {
        return $this->roleRepository->edit($id);
    }


    public function update(RoleRequest $request, $id)
    {        
        return $this->roleRepository->update($request, $id);
    }


    public function destroy($id)
    {
        return $this->roleRepository->destroy($id);
    }

}
