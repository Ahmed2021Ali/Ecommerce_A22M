<?php

namespace App\Repositories\UserDashboard;

use App\Models\Fav;
use App\Repositories\Interfaces\UserDashboard\FavInterface;
use Illuminate\Support\Facades\Auth;


class FavRepository implements FavInterface
{

    public function index()
    {
        return view('userDashboard.fav.index');
    }

    public function store($request, $product)
    {
        $fav = Fav::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();
        if ($fav) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'عفوا ! المنتج مضاف فعليا في المفضلة']);
            } else {
                return redirect()->back()->with(['error' => 'عفوا ! المنتج مضاف فعليا في المفضلة']);
            }
        } else {
            Fav::create(['product_id' => $product->id, 'user_id' => Auth::user()->id]);
            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'تم اضافة المنتج في المفضلة']);
            } else {
                return redirect()->back()->with(['success' => 'تم اضافة المنتج في المفضلة']);
            }
        }
    }


    public function destroy($fav)
    {
        $fav->delete();
        toastr()->success('تم بنجاح حذف المنتج من المفضلة');
        return redirect()->back();
    }
}
