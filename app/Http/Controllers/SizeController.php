<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Repositories\Interfaces\AdminDashboard\SizeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    protected $size;
    public function __construct(SizeInterface $size)
    {
        $this->size = $size;
    }
    public function index()
    {
        return $this->size->index();
    }
    public function store(Request $request)
    {
        return $this->size->store($request->validate(['name' => 'required|max:30']));
    }
    public function update(Request $request, Size $size)
    {
        return $this->size->update($request->validate(['name' => 'nullable|max:30']),$size);
    }
    public function destroy(Size $size)
    {
        return $this->size->destroy($size);
    }
}
