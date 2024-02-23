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
        return view('home', ['products' => Product::select('id', 'name', 'offer', 'price_after_offer')->where('status', 1)->paginate(9), 'banners' => Banner::all(), 'sliders' => Slider::all(),
            'services' => Service::where('status', 1)->get(), 'brands' => Brand::where('status', 1)->get(),
            'newProducts' => Product::select('id', 'name', 'offer', 'price_after_offer')->where('status', 1)->latest()->take(8)->get(),
            'featuredProducts' => Product::select('id', 'name', 'offer', 'price_after_offer')->where('status', 1)->where('offer', '!=', null)->take(8)->get(),
            'bestsellersProduct' => Product::select('id', 'name', 'offer', 'price_after_offer')->where('status', 1)->where('stock', '!=', null)->orderBy('stock', 'asc')->take(8)->get(),
            'categories' => Category::select('id', 'name')->get(),
            'lastCategoryProducts' => Category::select('id', 'name')->latest()->first(),

        ]);
    }

}
