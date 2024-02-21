<?php


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
    foreach ($files as $file) {
        $model->addMedia($file)->toMediaCollection($folder);
    }
}


function updateFiles($files, $model, $folder)
{
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

function calcReview($product): int
{
    $totalRating1 = $product->reviews()->where('star', 1)->count();
    $totalRating2 = $product->reviews()->where('star', 2)->count();
    $totalRating3 = $product->reviews()->where('star', 3)->count();
    $totalRating4 = $product->reviews()->where('star', 4)->count();
    $totalRating5 = $product->reviews()->where('star', 5)->count();
    $totalRating = $product->reviews()->count();
    if ($totalRating > 0) {
        return ( $totalRating1 * 1 + $totalRating2 * 2 + $totalRating3 * 3 + $totalRating4 * 4 + $totalRating5 * 5 ) / $totalRating;
    }
    return 0;
}

function calcTotalPriceOrder($subTotal, $deliveryPrice, $discount)
{
    if ($discount) {
        return ($subTotal - ($subTotal * $discount / 100)) + $deliveryPrice;
    }
    return $subTotal + $deliveryPrice;
}
function calcPriceProduct($price, $offer, $price_after_offer, $quantity)
{
    if ($offer) {
        return ($price_after_offer) * ($quantity ?? 1);
    }
    return $price * ($quantity ?? 1);
}


