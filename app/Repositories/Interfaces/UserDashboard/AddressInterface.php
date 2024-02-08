<?php

namespace App\Repositories\Interfaces\UserDashboard;

interface AddressInterface {

    public function index();
    public function create();

    public function store($request);
    public function edit($address);

    public function update($request,$address);

    public function destroy($cart);


}
