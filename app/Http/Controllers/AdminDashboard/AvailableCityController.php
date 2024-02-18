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
        $this->middleware('permission:المحافظات', ['only' => ['index']]);
        $this->middleware('permission:اضافة محافظة', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل محافظة', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف محافظة', ['only' => ['destroy']]);

        $this->city = $city;
        $this->middleware('checkAdminRole');
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
