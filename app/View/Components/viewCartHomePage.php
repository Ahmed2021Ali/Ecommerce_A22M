<?php

namespace App\View\Components;

use App\Models\Cart;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class viewCartHomePage extends Component
{

    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        if (Auth::check()) {
            return view('components.view-cart-home-page', [
                'carts' => Cart::where('user_id', Auth::user()->id)->paginate(4)]);
        }
        return view('components.view-cart-home-page');
    }
}
