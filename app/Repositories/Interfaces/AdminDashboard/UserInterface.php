<?php

namespace App\Repositories\Interfaces\AdminDashboard;

interface UserInterface {


    public function index($request);

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request, $id);
    
    public function destroy($id);

}