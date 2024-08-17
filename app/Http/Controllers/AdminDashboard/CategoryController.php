<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Requests\category\CategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AdminDashboard\CategoryInterface;

class CategoryController extends Controller
{

    protected $category;
    public function __construct(CategoryInterface $category)
    {
        $this->middleware('permission:الأقسام',  ['only' => ['index']]);
        $this->middleware('permission:اضافة قسم', ['only' => ['create' , 'store']]);
        $this->middleware('permission:تعديل قسم', ['only' => ['edit' , 'update']]);
        $this->middleware('permission:حذف قسم', ['only' => ['destroy']]);
        $this->middleware('permission:عرض الاقسام الفرعية الخاصة بهذا القسم', ['only' => ['show']]);

        $this->category = $category;
    }

    public function index()
    {
        return $this->category->index();
    }

    public function store(CategoryRequest $request)
    {
        return $this->category->store($request->validated());
    }

    public function show(Category $category)
    {
        return $this->category->show($category);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        return $this->category->update($request->validated(),$category);
    }

    public function destroy(Category $category)
    {
        return $this->category->destroy($category);
    }
}
