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
        $this->category = $category;
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
