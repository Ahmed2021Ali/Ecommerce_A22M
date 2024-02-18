<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Requests\brand\BrandStoreRequest;
use App\Http\Requests\brand\BrandUpdateRequest;
use App\Models\Brand;
use App\Repositories\Interfaces\AdminDashboard\BrandInterface;
use App\Http\Controllers\Controller;
class BrandController extends Controller
{
    protected $brand;
    public function __construct(BrandInterface $brand)
    {
        $this->middleware('permission:البراندات', ['only' => ['index']]);
        $this->middleware('permission:اضافة براند', ['only' => ['cretae', 'store']]);
        $this->middleware('permission:تعديل براند', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف براند', ['only' => ['destroy']]);

        $this->brand = $brand;
        $this->middleware('checkAdminRole');
    }
    
    public function index()
    {
        return $this->brand->index();
    }

    public function store(BrandStoreRequest $request)
    {
        return $this->brand->store($request->validated());
    }

    public function update(BrandUpdateRequest $request, brand $brand)
    {
        return $this->brand->update($request->validated(),$brand);
    }
    public function destroy(brand $brand)
    {
        return $this->brand->destroy($brand);
    }
}
