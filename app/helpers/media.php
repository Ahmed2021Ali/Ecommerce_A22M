<?php


use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

function priceAfterOffer($price, $offer)
{
    if (isset($offer)) {
        return $price - ($price * ($offer / 100));
    } else {
        return null;
    }
}

function uploadFiles($files, $model, $folder)
{
    if ($files) {
        foreach ($files as $file) {
            $model->addMedia($file)->toMediaCollection($folder);
        }
    }
}


function updateFiles($files, $model, $folder)
{
    if ($files) {
        $mediaItems = $model->getMedia($folder);
        if ($mediaItems) {
            foreach ($mediaItems as $media) {
                $media->delete();
            }
        }
        foreach ($files as $file) {
            $model->addMedia($file)->toMediaCollection($folder);
        }
    }
}

function calcReview($product)
{
        $totalRating = $product->reviews()->where('star', '!=', null)->count();
        $totalRating2 = $product->reviews()->where('star', '!=', null)->where('star', '>', 1)->count();
        if ($totalRating2 > 0 && $totalRating > 0) {
            return $totalRating2 / $totalRating;
        }
}


