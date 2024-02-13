<?php

namespace App\Repositories\Interfaces\UserDashboard;

interface ProductInterface {

    public function index();

    public function show($product);

    public function productsOfCategory($category);

}
