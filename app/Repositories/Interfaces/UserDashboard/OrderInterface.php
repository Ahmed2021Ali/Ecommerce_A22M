<?php

namespace App\Repositories\Interfaces\UserDashboard;

interface OrderInterface {


    public function show($order_number);

    public function destroy($order);


}
