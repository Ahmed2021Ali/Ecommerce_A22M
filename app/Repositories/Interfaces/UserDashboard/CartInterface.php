<?php

namespace App\Repositories\Interfaces\UserDashboard;

interface CartInterface {


    public function store($request,$product);

    public function update($request,$cart);

    public function destroy($cart);
    public function clear();


}
