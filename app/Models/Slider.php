<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Slider extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable=['status','title_p','title_h2','title_h4','title_h1'];
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaCollection('sliderFiles');
    }
}
