<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\review\ReviewStoreRequest;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function store(ReviewStoreRequest $request,Product $product)
    {
        Review::create([...$request->validated(),'user_id'=>Auth::user()->id,'product_id'=>$product->id]);
        return redirect()->back()->with('success','شكرا لتقيماتكم ');
    }

    public function edit($id)
    {
        return view('userDashboard.products.review.edit',['review'=>Review::find(decrypt($id))]);
    }

    public function update(ReviewStoreRequest $request, Review $review)
    {
        $review->update($request->validated());
        return to_route('products.show',$review->product_id)->with('success','تم تعديل تقسمك للمنتج بنجاح');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->back()->with('success','تم حذف تقييمك');
    }
}
