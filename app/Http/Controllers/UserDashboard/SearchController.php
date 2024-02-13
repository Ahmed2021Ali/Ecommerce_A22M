<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Repositories\Interfaces\UserDashboard\SearchInterface;
use Illuminate\Http\Request;

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
        return $this->search->search($request);
    }
    
    

}
