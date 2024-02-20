<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Fav;
use App\Models\Product;
use App\Repositories\Interfaces\UserDashboard\FavInterface;
use Illuminate\Http\Request;

class FavController extends Controller
{

    protected $fav;
    public function __construct(FavInterface $fav)
    {
        $this->fav = $fav;
        $this->middleware(['auth', 'throttle:60,1']);
    }
    public function index()
    {
        return $this->fav->index();
    }

    public function store(Request $request, Product $product)
    {
        return $this->fav->store($request,$product);
    }

    public function destroy(Fav $fav)
    {
        return $this->fav->destroy($fav);
    }
}
