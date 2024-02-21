<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_id', 'user_id', 'product_id', 'quantity',
        'price','color','size', 'total_price', 'delivery_status_of_orders', 'detailsOrder_id',
        'delivery_status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function deatailsOrder()
    {
        return $this->belongsTo(OrderDetails::class,'detailsOrder_id');
    }
}
