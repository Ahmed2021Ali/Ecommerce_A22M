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

    public function index()
    {
        //
    }



    public function store(ReviewStoreRequest $request,Product $product)
    {
        Review::create([...$request->validated(),'user_id'=>Auth::user()->id,'product_id'=>$product->id]);
        return redirect()->back()->with('success','شكرا لتقيماتكم ');
    }


    public function show(Review $review)
    {
        //
    }

    public function edit(Review $review)
    {
        return view('userDashboard.products.review.edit',['review'=>$review]);
    }

    public function update(Request $request, Review $review)
    {
        //
    }

    public function destroy(Review $review)
    {
        //
    }
}
