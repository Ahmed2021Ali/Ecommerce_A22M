<?php

namespace App\View\Components;

use App\Models\Fav;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CountFav extends Component
{

    public function __construct()
    {
        //
    }


    public function render(): View|Closure|string
    {
        if (Auth::check()) {
            $countFav = Fav::where('user_id', Auth::user()->id)->count();
            return view('components.count-fav', compact('countFav'));
        }
    }
}
