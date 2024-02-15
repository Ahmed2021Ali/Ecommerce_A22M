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
        $this->form->save($this->deliveryPrice, $this->subTotal, $this->discount);
    }

    public function mount()
    {
        $this->addresses = Address::select('id','city_id','address')->where('user_id', Auth::user()->id)->get();
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
