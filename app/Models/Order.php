<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'address_id', 'user_id', 'product_id', 'quantity',
        'price','color','size', 'total_price', 'delivery_status_of_orders', 'order_number',
        'delivery_status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
