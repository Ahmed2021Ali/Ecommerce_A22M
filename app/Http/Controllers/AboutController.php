<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Review;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('userDashboard.about.index',[
            'reviews'=>Review::where('star',5)->paginate(6),
            'brands'=>Brand::where('status',1)->get(),
        ]);
    }
}
