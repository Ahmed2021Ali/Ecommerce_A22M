<?php

namespace App\Repositories\Interfaces\UserDashboard;

interface ReviewInterface {


    public function store($request,$product);
    public function edit($review);

    public function update($request,$review);

    public function destroy($review);


}
