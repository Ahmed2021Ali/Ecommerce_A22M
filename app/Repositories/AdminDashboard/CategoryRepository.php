<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Category;
use App\Repositories\Interfaces\AdminDashboard\CategoryInterface;
use Illuminate\Support\Arr;

class CategoryRepository implements CategoryInterface
{

    public function index()
    {
        return view('adminDashboard.category.index', ['categories' => Category::paginate(10)]);
    }


    public function store($request)
    {
        $category = Category::create([...Arr::except($request, 'files')]);
        uploadFiles($request['files'], $category, 'categoryFiles');
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة القسم']);
    }


    public function show($category)
    {
        return view('adminDashboard.products.index', ['products' => $category->products]);
    }


    public function update($request, $category)
    {
        $category->update([...Arr::except($request, 'files')]);
        if (isset($request['files'])) {
            updateFiles($request['files'], $category, 'categoryFiles');
        }
        return redirect()->back()->with(['success' => ' تم بنجاح تحديث القسم']);
    }


    public function destroy($category)
    {
        $category->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف القسم']);
    }

}
