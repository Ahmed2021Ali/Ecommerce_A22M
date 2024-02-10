<?php

namespace App\Repositories\UserDashboard;

use App\Models\Category;
use App\Models\Fav;
use App\Models\Product;
use App\Repositories\Interfaces\UserDashboard\FavInterface;
use Illuminate\Support\Facades\Auth;


class FavRepository implements FavInterface
{

    public function index()
{
    $user = Auth::user();
    $categories = Category::all();

    $favs = Fav::where('user_id', $user->id)->paginate(9);
    $count = Fav::where('user_id', $user->id)->count();

    $newProducts = Product::latest()->take(3)->get();

    return view('userDashboard.fav.index', compact('favs', 'count', 'categories', 'newProducts'));
}


    public function store($product)
    {
        $fav = Fav::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();
        if ($fav) {
            return response()->json(['success' => false, 'message' => 'عفوا ! المنتج مضاف فعليا في المفضلة']);
        } else {
            Fav::create(['product_id' => $product->id, 'user_id' => Auth::user()->id]);
            return response()->json(['success' => true, 'message' => 'تم اضافة المنتج في المفضلة']);
        }
    }


    public function destroy($fav)
    {
        $fav->delete();
        toastr()->success('تم بنجاح حذف المنتج من المفضلة');
        return redirect()->back();
    }


}
