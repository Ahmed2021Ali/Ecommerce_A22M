<?php

namespace App\Livewire;

use App\Livewire\Forms\OrderForm;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class Order extends Component
{
    public OrderForm $form;
    public $total_price;
    public $deliveryPrice;

    public $addresses;
    public $discount;

    public function store()
    {
        $this->validate();
        $order_number = Str::random(16);
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        DB::beginTransaction();
        try {
            $order = OrderDetails::create([
                'user_id' => Auth::user()->id, 'address_id' => $this->form->address_id,
                'subtotal' => $this->total_price, 'delivery_price' => $this->deliveryPrice, 'order_number' => $order_number,
                'number_of_product' => Cart::where('user_id', Auth::user()->id)->count(), 'coupon_value' => $this->discount->value ?? null,
                'total' => $this->discount ? ($this->total_price + $this->deliveryPrice) * 10 / 100 + ($this->total_price + $this->deliveryPrice) : ($this->total_price + $this->deliveryPrice)
            ]);
            foreach ($carts as $cart) {
                \App\Models\Order::create([
                    'order_number' => $order_number, 'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity, 'color' => $cart->color ?? null, 'size' => $cart->size ?? null,
                    'price' => $cart->product->offer ? $cart->product->price_after_offer : $cart->product->price,
                    'total_price' => ($cart->product->offer ? $cart->product->price_after_offer : $cart->product->price) * $cart->quantity,
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
/*        dispatch(function () use ($order) {
            Mail::to('a22mcompany@gmail.com')->send(new \App\Mail\OrderMail($order));
        });*/
        return to_route('order.show', $order_number);
    }

    public function mount()
    {
        $this->addresses = Address::where('user_id', Auth::user()->id)->get();
    }

    public function changeAddress(): void
    {
        $this->deliveryPrice = Address::find($this->form->address_id)->city->price;
    }

    public function coupon()
    {
        $this->discount = Coupon::select('id', 'value')->where('name', $this->form->coupon)->where('status', 1)->first();
    }

    public function render()
    {
        return view('livewire.order');
    }

}
