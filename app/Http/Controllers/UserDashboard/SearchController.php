<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Repositories\Interfaces\UserDashboard\SearchInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{

    protected $search;

    public function __construct(SearchInterface $search)
    {
        $this->search = $search;

    }


    public function filter(Request $request)
    {
        return $this->search->filter($request);
    }


    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'required|max:255', 
        ], [
            'search.required' => 'يرجى إدخال كلمة البحث',
            'search.max' => 'البحث لا يجب أن يتجاوز :max حرفًا', 
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            toastr()->error($validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $search = $request->search;
        $products = Product::select('id', 'name', 'price', 'price_after_offer')
            ->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            })
            ->where('status', 1)
            ->orWhereHas('category', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })
            ->paginate(9);
    
        if ($products->isNotEmpty()) {
            $newProducts = Product::latest()->take(3)->get();
            $categories = Category::all();
            return view('userDashboard.products.index', compact('products', 'categories', 'newProducts'));
        } else {
            toastr()->error('لا توجد منتجات بذا الأسم');
            return redirect()->back();
        }
    }
    
    

}
