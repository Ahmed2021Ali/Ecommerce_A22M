<?php

namespace App\Repositories\UserDashboard;

use App\Repositories\Interfaces\UserDashboard\SearchInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SearchRepository implements SearchInterface
{
        public function filter($request)
        {
            $query = Product::query();

            $this->applyPriceFilter($query, $request->input('price'));
            $this->applyColorFilter($query, $request->input('color'));
            $products = $query->paginate(9);
            if ($products->isEmpty()) {
                toastr()->error('عفوا! لا يوجد منتجات بالمواصفات المحددة');
                return back();
            }
            return view('userDashboard.products.index', compact('products'));
    }

    protected function applyPriceFilter($query, $price)
    {
        if ($price) {
            $priceRange = explode(' - ', $price);
            $query->whereBetween('price_after_offer', [$priceRange[0], $priceRange[1]]);
        }
    }

    protected function applyColorFilter($query, $colors)
    {
        if ($colors) {
            $query->where(function ($query) use ($colors) {
                foreach ($colors as $color) {
                    $query->orWhere('color', 'like', "%$color%");
                }
            });
        }
    }

    public function search($request)
    {
        $validator = $this->validateSearchRequest($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $search = $request->search;
        $products = $this->executeSearch($search);
        if ($products->isNotEmpty()) {
            return view('userDashboard.products.index', ['products'=>$products]);
        } else {
            toastr()->error('لا توجد منتجات بهذه المواصفات');
            return redirect()->back();
        }
    }

    protected function validateSearchRequest(Request $request)
    {
        return Validator::make($request->all(), [
            'search' => 'required|max:255',
        ], [
            'search.required' => 'يرجى إدخال كلمة البحث',
            'search.max' => 'البحث لا يجب أن يتجاوز :max حرفًا',
        ]);
    }

    protected function executeSearch($search)
    {
        return Product::select('id', 'name', 'price', 'price_after_offer', 'description', 'offer')
            ->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            })->paginate(9);
    }


}
