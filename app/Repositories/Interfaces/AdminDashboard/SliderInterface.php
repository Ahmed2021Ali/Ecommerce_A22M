<?php

namespace App\Repositories\Interfaces\AdminDashboard;

interface SliderInterface {

    public function index();

    public function store($request);

    public function update($request ,$slider);

    public function destroy($slider);


}
