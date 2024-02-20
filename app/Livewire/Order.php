<?php

namespace App\Livewire;

use App\Livewire\Forms\OrderForm;
use App\Models\Address;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Order extends Component
{
    public OrderForm $form;
    public $subTotal;
    public $deliveryPrice;

    public $addresses;
    public $discount;

    public function store()
    {
        $this->validate(['deliveryPrice' => 'required|numeric', 'subTotal' => 'required|numeric', 'discount' => 'nullable|numeric']);
        $this->form->storeOrder($this->deliveryPrice, $this->subTotal, $this->discount);
    }

    public function mount()
    {
        $this->addresses = Address::select('id', 'city_id', 'address')->where('user_id', Auth::user()->id)->get();
    }

    public function changeAddress(): void
    {
        $address = Address::find($this->form->address_id);
        if (isset($address)) {
            $this->deliveryPrice = $address->city->price;
        }
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
