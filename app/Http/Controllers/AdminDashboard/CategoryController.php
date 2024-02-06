<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Models\Category;
use Illuminate\Http\Request;
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
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        //
    }


    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        //
    }
}
