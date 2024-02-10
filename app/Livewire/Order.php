<?php

namespace App\Livewire;

use App\Livewire\Forms\OrderForm;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
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
        foreach ($carts as $cart) {
            Order::create([
                'order_number' => $order_number, 'product_id' => $cart->product_id,
                'quantity'=>$cart->quantity, 'price'=>$cart->price,
                'offer'=>$cart->offer, 'price_after_offer'=>$cart->price_after_offer,
                'total_price'=>($cart->offer ? $cart->price_after_offer : $cart->price) * $cart->quantity,
            ]);
        }


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
        $this->discount = Coupon::select('id', 'value')->where('name', $this->form->coupon)->first();
    }

    public function render()
    {
        return view('livewire.order');
    }
}
