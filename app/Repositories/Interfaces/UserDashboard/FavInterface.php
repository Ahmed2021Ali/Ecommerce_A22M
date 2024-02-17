<?php

namespace App\Repositories\Interfaces\UserDashboard;

interface FavInterface {

    public function index();

    public function store($request, $product);

    public function destroy($fav);


}
