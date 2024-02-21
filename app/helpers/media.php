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

function calcReview($product)
{
    /*    $totalRating = $product->reviews()->where('star', '!=', null)->count();
        $totalRating2 = $product->reviews()->where('star', '!=', null)->where('star', '>', 1)->count();
        if ($totalRating2 > 0 && $totalRating > 0) {
            return $totalRating2 / $totalRating;
        }*/

    /*
     *
     * ********************************************************
     *  $totalRating = $product->reviews()->where('star', '!=', null)->count();
     *  $totalRating2 = $product->reviews()->where('star', '!=', null)->where('star', '>', 1)->count();
     *
     * */
    return 5;
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


