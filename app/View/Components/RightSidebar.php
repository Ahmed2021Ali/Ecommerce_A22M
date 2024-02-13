<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RightSidebar extends Component
{

    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.right-sidebar',['categories'=>Category::paginate(8),
            'newProducts' => Product::latest()->take(3)->get(), 'colors'=>Color::paginate(10)
            ]);
    }
}
