<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Requests\brand\BrandStoreRequest;
use App\Http\Requests\brand\BrandUpdateRequest;
use App\Models\Brand;
use App\Repositories\Interfaces\AdminDashboard\BrandInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class BrandController extends Controller
{
    protected $brand;
    public function __construct(BrandInterface $brand)
    {
        $this->brand = $brand;
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
