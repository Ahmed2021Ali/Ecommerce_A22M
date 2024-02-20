<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\AvailableCity;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{


    public function index()
    {
        return view('adminDashboard.dashboard',[
            'countUsers'=>User::count(), 'countCategories'=>Category::count(),
            'countProducts'=>Product::count(),'countCity'=>AvailableCity::count(),
            'countorderwiting'=>OrderDetails::where('delivery_status',0)->count(),
            'countorderdone'=>OrderDetails::where('delivery_status',1)->count(),
            'countCoupon'=>Coupon::count(),
        ] );
    }
}
