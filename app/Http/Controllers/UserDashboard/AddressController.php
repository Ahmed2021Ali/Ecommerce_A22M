<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\address\AddressRequest;
use App\Http\Requests\address\UpdateAddressRequest;
use App\Models\Address;
use App\Repositories\Interfaces\UserDashboard\AddressInterface;

class AddressController extends Controller
{

    protected $address;
    public function __construct(AddressInterface $address)
    {
        $this->address = $address;
        $this->middleware('auth');
    }
    public function create()
    {
        return $this->address->create();
    }
    public function store(AddressRequest $request)
    {
        return $this->address->store($request->validated());
    }
    public function edit($id)
    {
        return $this->address->edit(Address::find(decrypt($id)));
    }
    public function update(AddressRequest $request, Address $address)
    {
        return $this->address->update($request->validated(),$address);
    }
    public function destroy(Address $address)
    {
        return $this->address->destroy($address);
    }
}
