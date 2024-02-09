<?php

namespace App\Repositories\UserDashboard;

use App\Models\Category;
use App\Models\Fav;
use App\Repositories\Interfaces\UserDashboard\FavInterface;
use Illuminate\Support\Facades\Auth;


class FavRepository implements FavInterface
{

    public function index()
    {
        return view('userDashboard.fav.index', ['favs'=>Fav::where('user_id', Auth::user()->id)->paginate(6),
            'count'=>Fav::where('user_id', Auth::user()->id)->count(), 'categories'=>Category::paginate(6)
            ]);
    }

    public function store($product)
    {
        $fav = Fav::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();
        if ($fav) {
            return redirect()->back()->with('error', 'الكتاب مضاف فعليا في المفضلة');
        } else {
            Fav::create(['product_id' => $product->id, 'user_id' => Auth::user()->id]);
            return redirect()->back()->with('success', ' تم اضافة الكتاب في المفضلة');
        }
    }

    public function destroy($fav)
    {
        $fav->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف المنتج من المفضلة']);
    }

}
