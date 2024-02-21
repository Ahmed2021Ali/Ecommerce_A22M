<?php

namespace App\Livewire\Forms;

use App\Jobs\SendMail;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OrderForm extends Form
{
    #[Validate('required')]
    public $address_id;

    #[Validate('nullable|min:5')]
    public $coupon;

    public function storeOrder($deliveryPrice, $subTotal, $discount)
    {
        $this->validate();
        $order_number = Str::random(16);
        DB::beginTransaction();
        try {
            $order = OrderDetails::create([
                'user_id' => Auth::user()->id, 'address_id' => $this->address_id, 'subtotal' => $subTotal,
                'delivery_price' => $deliveryPrice, 'order_number' => $order_number,
                'number_of_product' => Auth::user()->carts()->count(),'coupon_value' => $discount->value ?? null,
                'total' => calcTotalPriceOrder($subTotal, $deliveryPrice, $discount->value??null)
            ]);
            foreach (Auth::user()->carts() as $cart) {
                Order::create([
                    'order_number' => $order_number, 'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,'color' => $cart->color,'size' => $cart->size,
                    'price' => calcPriceProduct($cart->product->price,$cart->product->offer,$cart->product->price_after_offer,null),
                    'total_price' => calcPriceProduct($cart->product->price,$cart->product->offer,$cart->product->price_after_offer,$cart->quantity),
                ]);
                Product::where('id', $cart->product_id)->update([
                    'quantity' => ($cart->product->quantity) - ($cart->quantity), 'stock' => 1 + $cart->product->stock,
                ]);
                $cart->delete();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        // Send mail for admin -> dispatch
        SendMail::dispatch($order);
        return to_route('order.show', $order_number);
    }

}
