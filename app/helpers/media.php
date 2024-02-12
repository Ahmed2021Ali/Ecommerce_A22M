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
    if ($files) {
        foreach ($files as $file) {
            $model->addMedia($file)->toMediaCollection($folder);
        }
    }
}


function updateFiles($files, $model, $folder)
{
    if ($files) {
        $model->media()->delete();
        foreach ($files as $file) {
            $model->addMedia($file)->toMediaCollection($folder);
        }
    }
}

function calcReview($product)
{
    //$totalRating = $product->reviews->where('star',=>,1)->count();

//dd($totalRating);

}


