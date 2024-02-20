<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Models\Size;
use App\Repositories\Interfaces\AdminDashboard\SizeInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    protected $size;
    public function __construct(SizeInterface $size)
    {
        $this->middleware('permission:المقاسات',  ['only' => ['index']]);
        $this->middleware('permission:اضافة مقاسات', ['only' => ['cretae' , 'store']]);
        $this->middleware('permission:تعديل مقاسات', ['only' => ['edit' , 'update']]);
        $this->middleware('permission:حذف مقاسات', ['only' => ['destroy']]);

        $this->size = $size;
        $this->middleware(['checkAdminRole','throttle:60,1']);
    }
    public function index()
    {
        return $this->size->index();
    }
    public function store(Request $request)
    {
        return $this->size->store($request->validate(['name' => 'required|string|min:1|max:30']));
    }
    public function update(Request $request, Size $size)
    {
        return $this->size->update($request->validate(['name' => 'required|string|min:1|max:30']),$size);
    }
    public function destroy(Size $size)
    {
        return $this->size->destroy($size);
    }
}
