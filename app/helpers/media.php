<?php




function uploadFiles($files, $model, $folder)
{
    if ($files) {
       // dd($file);
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



