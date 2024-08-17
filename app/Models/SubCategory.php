<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SubCategory extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = ['name','category_id'];

    public function subCategory()
    {
        return $this->belongsTo(Category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class)->where('status',1)->paginate(8);
    }
    public function products2()
    {
        return $this->hasMany(Product::class)->select('id','price', 'name', 'offer', 'price_after_offer')->where('status',1);
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaCollection('subCategoryFiles');
    }
}
