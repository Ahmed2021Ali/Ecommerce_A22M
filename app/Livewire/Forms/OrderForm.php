<?php

namespace App\Livewire\Forms;

use App\Jobs\SendMail;
use App\Models\Color;
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

    #[Validate('nullable')]
    public $coupon;

    public function storeOrder($deliveryPrice, $subTotal, $discount)
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $order = OrderDetails::create([
                'user_id' => Auth::user()->id, 'address_id' => $this->address_id, 'subtotal' => $subTotal,
                'delivery_price' => $deliveryPrice, 'order_number' => Str::random(16),
                'number_of_product' => Auth::user()->carts()->count(), 'coupon_value' => $discount->value ?? null,
                'total' => calcTotalPriceOrder($subTotal, $deliveryPrice, $discount->value ?? null)
            ]);
            foreach (Auth::user()->BuyProducts as $cart) {
                Order::create([
                    'detailsOrder_id' => $order->id, 'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity, 'color' => isset($cart->color) ? Color::where('value', $cart->color)->first()->name : null,
                    'size' => $cart->size,
                    'price' => calcPriceProduct($cart->product->price, $cart->product->offer, $cart->product->price_after_offer, null),
                    'total_price' => calcPriceProduct($cart->product->price, $cart->product->offer, $cart->product->price_after_offer, $cart->quantity),
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
        return to_route('orders.show', encrypt($order->id));
    }

}
