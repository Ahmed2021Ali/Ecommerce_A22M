<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'category_id', 'id', 'price', 'name',
        'description', 'offer', 'status', 'quantity',
        'price_after_offer', 'stock', 'color', 'size'
    ];
    protected $casts = [
        'color' => 'array',
        'size' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaCollection('productsFiles');
    }
}
