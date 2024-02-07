<?php

namespace App\Repositories\Interfaces\AdminDashboard;

interface ServiceInterface {

    public function index();

    public function store($request);

    public function update($request ,$service);

    public function destroy($service);


}
