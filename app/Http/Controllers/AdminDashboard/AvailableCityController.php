<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Requests\city\CityRequest;
use App\Models\AvailableCity;
use App\Repositories\Interfaces\AdminDashboard\CityInterface;
use App\Http\Controllers\Controller;
class AvailableCityController extends Controller
{

    protected $city;
    public function __construct(CityInterface $city)
    {
        $this->middleware('permission:المحافظات', ['only' => ['index']]);
        $this->middleware('permission:اضافة محافظة', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل محافظة', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف محافظة', ['only' => ['destroy']]);
        $this->city = $city;
    }

    public function index()
    {
        return $this->city->index();
    }

    public function store(CityRequest $request)
    {
        return $this->city->store($request->validated());
    }

    public function update(CityRequest $request, AvailableCity $city)
    {
        return $this->city->update($request->validated(),$city);
    }

    public function destroy(AvailableCity $city)
    {
        return $this->city->destroy($city);
    }
}
