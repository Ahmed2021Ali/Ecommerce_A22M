<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\color\ColorRequest;
use App\Models\Color;
use App\Repositories\AdminDashboard\ColorRepository;


class ColorController extends Controller
{

    protected $color;

    public function __construct(ColorRepository $color)
    {
        $this->middleware('permission:الألوان',  ['only' => ['index']]);
        $this->middleware('permission:اضافة الوان', ['only' => ['cretae' , 'store']]);
        $this->middleware('permission:تعديل الوان', ['only' => ['edit' , 'update']]);
        $this->middleware('permission:حذف الوان', ['only' => ['destroy']]);

        $this->color = $color;
        $this->middleware(['checkAdminRole','throttle:60,1']);
    }

    public function index()
    {
        return $this->color->index();
    }

    public function store(ColorRequest $request)
    {
        return $this->color->store($request->validated());
    }

    public function update(ColorRequest $request, Color $color)
    {
        return $this->color->update($request->validated(),$color);
    }
    public function destroy(Color $color)
    {
        return $this->color->destroy($color);
    }
}
