<?php

namespace App\Repositories\UserDashboard;

use App\Models\Fav;
use App\Repositories\Interfaces\UserDashboard\FavInterface;
use Illuminate\Support\Facades\Auth;


class FavRepository implements FavInterface
{

    public function index()
    {
        $favs = Fav::where('user_id', Auth::user()->id)->paginate(5);
      //  return view('user.favourites.index', compact('favs'));
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
