<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Requests\brand\BrandRequest;
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
    }

    public function index()
    {
        return $this->brand->index();
    }

    public function store(BrandRequest $request)
    {
        return $this->brand->store($request->validated());
    }

    public function update(BrandRequest $request, brand $brand)
    {
        return $this->brand->update($request->validated(),$brand);
    }
    public function destroy(brand $brand)
    {
        return $this->brand->destroy($brand);
    }
}
