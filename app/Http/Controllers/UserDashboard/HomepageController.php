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
        $products = Product::all();
        $banners = Banner::all();
        $sliders = Slider::all();
        $services = Service::all();
        $brands = Brand::all();
        $newArrivalProducts = Product::latest()->take(10)->get();
        $newAddedProducts = Product::latest()->take(8)->get();
        $featuredProducts = Product::paginate(10);
        $banners = Banner::latest()->take(3)->get();
        return view('home', 
        compact(
        'products',
        'banners',
        'sliders', 
        'services', 
        'newArrivalProducts',
        'brands', 
        'newAddedProducts',
        'featuredProducts',
        'banners'
    ));
    }

}
