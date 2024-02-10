<?php

namespace App\Repositories\Interfaces\AdminDashboard;

interface CityInterface {

    public function index();

    public function store($request);

    public function update($request ,$city);

    public function destroy($city);


}
