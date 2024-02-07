<?php

namespace App\Repositories\Interfaces\AdminDashboard;

interface BannerInterface {

    public function index();

    public function store($request);

    public function update($request ,$banner);

    public function destroy($banner);


}
