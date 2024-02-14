<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\review\ReviewStoreRequest;
use App\Http\Requests\review\ReviewUpdateRequest;
use App\Models\Product;
use App\Models\Review;
use App\Repositories\Interfaces\UserDashboard\ReviewInterface;

class ReviewController extends Controller
{

    protected $review;

    public function __construct(ReviewInterface $review)
    {
        $this->review = $review;
        $this->middleware('auth');
    }
    public function store(ReviewStoreRequest $request, Product $product)
    {
        return $this->review->store($request->validated(), $product);
    }
    public function edit($id)
    {
        return $this->review->edit(Review::find(decrypt($id)));
    }
    public function update(ReviewUpdateRequest $request, Review $review)
    {
        return $this->review->update($request->validated(), $review);
    }
    public function destroy(Review $review)
    {
        return $this->review->destroy($review);
    }
}
