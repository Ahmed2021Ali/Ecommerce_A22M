<?php

namespace App\Repositories\Interfaces\AdminDashboard;

interface CategoryInterface {

    public function index();
    public function store($request);
    public function update($request ,$category);
    public function show($category);
    public function destroy($category);


}
