<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\address\StoreAddressRequest;
use App\Http\Requests\address\UpdateAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    protected $address;
    public function __construct(SliderInterface $address)
    {
        $this->address = $address;
    }
    public function create()
    {
        return $this->address->create();
    }
    public function index()
    {
        return $this->address->index();
    }
    public function store(StoreAddressRequest $request)
    {
        return $this->address->store($request->validated());
    }
    public function edit(Address $address)
    {
        return $this->address->edit($address);
    }
    public function update(UpdateAddressRequest $request, Address $address)
    {
        return $this->address->update($request->validated(),$address);
    }
    public function destroy(Address $address)
    {
        return $this->address->destroy($address);
    }
}
