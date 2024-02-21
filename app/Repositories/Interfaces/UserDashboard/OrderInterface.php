<?php

namespace App\Repositories\Interfaces\UserDashboard;

interface OrderInterface {


    public function show($order);

    public function destroy($order);
    public function search($order_number);


}
