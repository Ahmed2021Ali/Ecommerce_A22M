<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Category;
use App\Repositories\Interfaces\AdminDashboard\CategoryInterface;
use Illuminate\Support\Arr;

class CategoryRepository implements CategoryInterface
{

    public function index()
    {
        return view('adminDashboard.category.index', ['categories' => Category::select('id','name')->latest()->paginate(10)]);
    }

    public function store($request)
    {
         Category::create(['name' => $request['name']]);
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة القسم']);
    }

    public function show($category)
    {
        return view('adminDashboard.subCategory.index', ['subCategories' => $category->subCategories(),
            'categories' =>Category::select('id','name')->get(),'category'=>$category]);
    }

    public function update($request, $category)
    {
        $category->update(['name' => $request['name']]);
        return redirect()->back()->with(['success' => ' تم بنجاح تحديث القسم']);
    }

    public function destroy($category)
    {
        $category->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف القسم']);
    }

}
