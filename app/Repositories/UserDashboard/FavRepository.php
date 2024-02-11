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
        return view('userDashboard.fav.index', [
            'favs' => Auth::user()->favs(),
            'count' => Fav::where('user_id', Auth::user()->id)->count(),
            'categories' => Category::paginate(10),
            'newProducts' => Product::latest()->take(3)->get()
        ]);
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
