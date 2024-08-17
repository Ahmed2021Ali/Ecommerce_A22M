<?php

namespace App\Http\Controllers;

use App\Http\Requests\subCategory\SubCategoryRequest;
use App\Models\SubCategory;
use App\Repositories\Interfaces\AdminDashboard\SubCategoryInterface;

class SubCategoryController extends Controller
{
    protected $subCategory;
    public function __construct(SubCategoryInterface $subCategory)
    {
        $this->middleware('permission:الأقسام الفرعية',  ['only' => ['index']]);
        $this->middleware('permission:اضافة قسم فرعي', ['only' => ['create' , 'store']]);
        $this->middleware('permission:تعديل قسم فرعي', ['only' => ['edit' , 'update']]);
        $this->middleware('permission:حذف قسم فرعي' , ['only' => ['destroy']]);
        $this->middleware('permission:عرض المنتجات الخاصة بالقسم', ['only' => ['show']]);
        $this->subCategory = $subCategory;
    }

    public function index()
    {
        return $this->subCategory->index();
    }

    public function store(SubCategoryRequest $request)
    {
        return $this->subCategory->store($request->validated());
    }

    public function show(SubCategory $subCategory)
    {
        return $this->subCategory->show($subCategory);
    }

    public function update(SubCategoryRequest $request, SubCategory $subCategory)
    {
        return $this->subCategory->update($request->validated(),$subCategory);
    }

    public function destroy(SubCategory $subCategory)
    {
        return $this->subCategory->destroy($subCategory);
    }
}
