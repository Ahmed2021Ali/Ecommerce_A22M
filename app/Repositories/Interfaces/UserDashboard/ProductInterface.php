<?php

namespace App\Repositories\Interfaces\UserDashboard;

interface ProductInterface {

    public function index();

    public function show($id);

    public function productsOfCategory($categoryId);

}
