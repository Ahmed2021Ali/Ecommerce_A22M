<?php

namespace App\Repositories\Interfaces\AdminDashboard;

interface ColorInterface {

    public function index();

    public function store($request);

    public function update($request ,$color);

    public function destroy($color);


}
