<?php

namespace App\Repositories\Interfaces\AdminDashboard;

interface OrderInterface {

    public function index();

    public function deliveryStatus($order);

    public function ordersDone();

    public function ordersCancelled();

    public function destroy($order);

}
