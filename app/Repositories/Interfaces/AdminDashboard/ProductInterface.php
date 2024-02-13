<?php

namespace App\Repositories\Interfaces\AdminDashboard;

interface ProductInterface {

    public function index();

    public function create();

    public function store($request);
    public function show($product);


    public function edit($product);

    public function update($request ,$product);

    public function destroy($product);

}
