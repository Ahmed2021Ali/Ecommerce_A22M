<?php

namespace App\Repositories\Interfaces\AdminDashboard;

interface BrandInterface {

    public function index();

    public function store($request);

    public function update($request ,$brand);

    public function destroy($brand);


}
