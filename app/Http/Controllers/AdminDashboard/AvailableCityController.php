<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Requests\city\CityStoreRequest;
use App\Http\Requests\city\CityUpdateRequest;
use App\Models\AvailableCity;
use App\Repositories\Interfaces\AdminDashboard\CityInterface;
use App\Http\Controllers\Controller;
class AvailableCityController extends Controller
{

    protected $city;
    public function __construct(CityInterface $city)
    {
        $this->city = $city;
    }
    public function index()
    {
        return $this->city->index();
    }
    public function store(CityStoreRequest $request)
    {
        return $this->city->store($request->validated());
    }

    public function update(CityUpdateRequest $request, AvailableCity $city)
    {
        return $this->city->update($request->validated(),$city);
    }
    public function destroy(AvailableCity $city)
    {
        return $this->city->destroy($city);
    }
}
