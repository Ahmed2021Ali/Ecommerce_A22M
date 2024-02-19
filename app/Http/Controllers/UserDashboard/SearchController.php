<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\FilterRequest;

use App\Repositories\Interfaces\UserDashboard\SearchInterface;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    protected $search;

    public function __construct(SearchInterface $search)
    {
        $this->search = $search;
        $this->middleware('throttle:45,1');
    }


    public function filter(FilterRequest $request)
    {
        return $this->search->filter($request);
    }


    public function search(Request $request)
    {
        return $this->search->search($request);
    }
    
    

}
