<?php

namespace App\Repositories\AdminDashboard;

use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\Interfaces\AdminDashboard\SubCategoryInterface;

class SubCategoryRepository implements SubCategoryInterface
{

    public function index()
    {
        return view('adminDashboard.subCategory.index', ['subCategories' => SubCategory::latest()->paginate(10),
            'categories' =>Category::select('id','name')->get()]);
    }

    public function store($request)
    {
       $subCategory= SubCategory::create(['name'=>$request['name'],'category_id'=>$request['category_id']]);
        if (isset($request['files'])) {
            uploadFiles($request['files'], $subCategory, 'subCategoryFiles');
        }
        return redirect()->back()->with(['success' => '  تم بنجاح اضافة القسم']);
    }

    public function show($subCategory)
    {
        return view('adminDashboard.products.index', ['subCategory'=>$subCategory,'products' => $subCategory->products()]);
    }

    public function update($request, $subCategory)
    {
        $subCategory->update(['name'=>$request['name'],'category_id'=>$request['category_id']]);
        if (isset($request['files'])) {
            updateFiles($request['files'], $subCategory, 'subCategoryFiles');
        }
        return redirect()->back()->with(['success' => ' تم بنجاح تحديث القسم']);
    }

    public function destroy($subCategory)
    {
        $subCategory->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف القسم']);
    }

}
