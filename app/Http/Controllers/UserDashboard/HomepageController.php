<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;

class HomepageController extends Controller
{
    public function index()
    {
        return view('home', ['products'=>Product::where('status',1)->paginate(9), 'banners'=>Banner::all(), 'sliders'=>Slider::all(),
        'services'=>Service::where('status',1)->get(),'brands'=>Brand::where('status',1)->get(),'newArrivalProducts'=>Product::where('status',1)->latest()->take(6)->get(),
        'newAddedProducts'=>Product::where('status',1)->latest()->take(12)->get(),
        'featuredProducts'=>Product::where('status',1)->paginate(12),
        'bestsellersProduct'=>Product::where('status',1)->where('stock', '!=', null)->orderBy('stock','asc')->paginate(12),
        'categories'=> Category::all(),
    ]);
    }

}
