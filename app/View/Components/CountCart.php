<?php

namespace App\View\Components;

use App\Models\Cart;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CountCart extends Component
{

    public function __construct()
    {
        //
    }


    public function render(): View|Closure|string
    {
        if (Auth::check()) {
            $countCart = Cart::where('user_id', Auth::user()->id)->count();
            return view('components.count-cart', compact('countCart'));
        }
        return view('components.count-cart');
    }
}
