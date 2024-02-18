<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Requests\category\StoreCategoryRequest;
use App\Http\Requests\category\UpdateCategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AdminDashboard\CategoryInterface;

class CategoryController extends Controller
{

    protected $category;
    public function __construct(CategoryInterface $category)
    {
        $this->middleware(['checkAdminRole'] );
        $this->middleware('permission:الأقسام',  ['only' => ['index']]);
        $this->middleware('permission:اضافة قسم', ['only' => ['cretae' , 'store']]);
        $this->middleware('permission:تعديل قسم', ['only' => ['edit' , 'update']]);
        $this->middleware('permission:حذف قسم', ['only' => ['destroy']]);
        $this->middleware('permission:عرض المنتجات الخاصة بالقسم', ['only' => ['show']]);

        $this->category = $category;
        $this->middleware('checkAdminRole');
    }

    public function index()
    {
        return $this->category->index();
    }

    public function store(StoreCategoryRequest $request)
    {
        return $this->category->store($request->validated());
    }

    public function show(Category $category)
    {
        return $this->category->show($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        return $this->category->update($request->validated(),$category);
    }
    
    public function destroy(Category $category)
    {
        return $this->category->destroy($category);
    }
}
