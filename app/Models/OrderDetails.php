<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['user_id','address_id', 'total','coupon_value', 'delivery_price','subtotal','order_number',
        'number_of_product','delivery_price'];

    public function address()
    {
        return $this->belongsTo(Address::class)->withTrashed();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
