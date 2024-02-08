<?php

namespace App\Repositories\Interfaces\UserDashboard;

interface FavInterface {

    public function index();

    public function store($product);

    public function destroy($product);


}
