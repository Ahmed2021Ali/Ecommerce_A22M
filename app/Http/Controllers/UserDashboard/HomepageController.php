<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;

class HomepageController extends Controller
{
    public function index()
    {
        return view('home', ['products'=>Product::paginate(9), 'banners'=>Banner::all(), 'sliders'=>Slider::all(),
        'services'=>Service::all(),'brands'=>Brand::all(),'newArrivalProducts'=>Product::latest()->take(6)->get(),
        'newAddedProducts'=>Product::latest()->take(12)->get(),
        'featuredProducts'=>Product::paginate(12),
        'bestsellersProduct'=>Product::where('status',1)->where('stock', '!=', null)->orderBy('stock','asc')->paginate(12),

    ]);
    }

}
