<?php

namespace App\Repositories\UserDashboard;

use App\Models\Fav;
use App\Repositories\Interfaces\UserDashboard\FavInterface;
use Illuminate\Support\Facades\Auth;


class FavRepository implements FavInterface
{

    public function index()
    {
        $favs = Fav::where('user_id', Auth::user()->id)->paginate(4);
        return view('user.favourites.index', compact('favs'));
    }

    public function store($product)
    {
        $favProduct = Fav::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();
        if ($favProduct) {
            return redirect()->back()->with('error', 'الكتاب مضاف فعليا في المفضلة');
        } else {
            Fav::create(['product_id' => $product->id, 'user_id' => Auth::user()->id]);
            return redirect()->back()->with('success', ' تم اضافة الكتاب في المفضلة');
        }
    }

    public function destroy($product)
    {
        $product->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف المنتج من المفضلة']);
    }

}
