<?php

namespace App\Repositories\Interfaces\AdminDashboard;

interface SizeInterface {

    public function index();

    public function store($request);

    public function update($request ,$size);

    public function destroy($size);


}
