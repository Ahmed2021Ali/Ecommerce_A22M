<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'small_title', 'main_title', 'product_id'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
