<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\SubCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryMobile extends Component
{

    public function __construct()
    {
        //
    }


    public function render(): View|Closure|string
    {
        return view('components.category-mobile',['Categories'=>Category::paginate(25)]);
    }
}
