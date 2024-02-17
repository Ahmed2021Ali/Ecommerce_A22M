<?php

namespace App\View\Components;

use App\Models\Category;
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
        return view('components.category-mobile',['categories'=>Category::paginate(25)]);
    }
}
