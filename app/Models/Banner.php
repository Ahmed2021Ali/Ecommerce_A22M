<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Banner extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['status', 'small_title', 'main_title', 'product_id'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaCollection('bannerFiles');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
