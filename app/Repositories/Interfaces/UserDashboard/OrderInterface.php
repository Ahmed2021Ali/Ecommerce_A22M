<?php

namespace App\Repositories\Interfaces\UserDashboard;

interface OrderInterface {

    public function index();

    public function store($request,$product);


    public function destroy($order);


}
