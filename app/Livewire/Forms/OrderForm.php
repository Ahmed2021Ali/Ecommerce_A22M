<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class OrderForm extends Form
{
    #[Validate('required')]
    public $address_id = '';

    #[Validate('nullable|min:5')]
    public $coupon = '';

}
