<?php

namespace App\Repositories\Interfaces\UserDashboard;

interface SearchInterface {

    public function filter($request);
    public function search($request);
}
