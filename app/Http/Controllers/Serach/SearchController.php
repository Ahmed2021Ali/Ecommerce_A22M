<?php

namespace App\Http\Controllers\Serach;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function filter(Request $request)
    {
        $query = Product::query();
    
        $categories = Category::all();
        $newProducts = Product::latest()->take(3)->get();
    
        if ($request->has('price')) {
            $priceRange = explode(' - ', $request->input('price'));
            $query->whereBetween('price_after_offer', [$priceRange[0], $priceRange[1]]);
        }
    
        if ($request->has('color')) {
            $colors = $request->input('color');
        
            $query->where(function ($query) use ($colors) {
                foreach ($colors as $color) {
                    $query->orWhere('color', 'like', "%$color%");
                }
            });
        }
        
    
        $products = $query->paginate(9);
    
        if ($products->isEmpty()) {
            toastr()->error('عفوا! لا يوجد منتجات بالمواصفات المحددة');
            return back();
        }
    
        // Return the filtered products to the view
        return view('userDashboard.products.index', compact('products', 'categories', 'newProducts'));
    }
    

}
