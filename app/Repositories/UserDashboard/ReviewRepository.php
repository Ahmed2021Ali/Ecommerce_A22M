<?php

namespace App\Repositories\UserDashboard;

use App\Models\Review;
use App\Repositories\Interfaces\UserDashboard\ReviewInterface;
use Illuminate\Support\Facades\Auth;


class ReviewRepository implements ReviewInterface
{

    public function store($request, $product)
    {
        Review::create([...$request, 'user_id' => Auth::user()->id, 'product_id' => $product->id]);
        return  redirect()->back()->with('success', 'تم تقييمك للمنتج بنجاح');
    }

    public function edit($review)
    {
        return view('userDashboard.products.review.edit', ['review' => $review]);
    }

    public function update($request, $review)
    {
        $review->update([...$request]);
        return to_route('products.show',encrypt($review->product_id))->with('success', 'تم تعديل تقييمك للمنتج بنجاح');
    }

    public function destroy($review)
    {
        $review->delete();
        return redirect()->back()->with('success', 'تم حذف تقييمك');
    }

}
