<?php

namespace App\Http\Controllers\AdminDashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Repositories\Interfaces\AdminDashboard\UserInterface;


class UserController extends Controller
{

    private $user;

    public function __construct(UserInterface $user) {
        $this->middleware(['checkAdminRole','throttle:45,1']);
        $this->middleware('permission:المستخدمين',  ['only' => ['index']]);
        $this->middleware('permission:اضافة مستخدم', ['only' => ['cretae' , 'store']]);
        $this->middleware('permission:تعديل مستخدم', ['only' => ['edit' , 'update']]);
        $this->middleware('permission:حذف مستخدم', ['only' => ['destroy']]);

        $this->user = $user;
    }


    public function index(Request $request)
    {
        return $this->user->index($request);
    }


    public function create()
    {
        return $this->user->create();
    }


    public function store(UserRequest $request)
    {    
        return $this->user->store($request);
    }


    public function edit($id)
    {
        return $this->user->edit($id);
    }


    public function update(UserRequest $request, $id)
    {
        return $this->user->update($request, $id);
    }


    public function destroy($id)
    {
        return $this->user->destroy($id);
    }

}
