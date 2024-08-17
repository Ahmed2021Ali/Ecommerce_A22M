<?php

namespace App\Repositories\Interfaces\AdminDashboard;

interface SubCategoryInterface {

    public function index();
    public function store($request);
    public function update($request ,$subCategory);
    public function show($subCategory);
    public function destroy($subCategory);


}
