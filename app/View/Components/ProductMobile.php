<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductMobile extends Component
{
    public function __construct()
    {
        //
    }
    public function render(): View|Closure|string
    {
        return view('components.product-mobile',['products'=>Product::paginate(30)]);
    }
}
