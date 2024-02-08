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
        'price', 'offer', 'price_after_offer',
        'total_price', 'delivery_status_of_orders', 'order_number',
        'delivery_status',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
