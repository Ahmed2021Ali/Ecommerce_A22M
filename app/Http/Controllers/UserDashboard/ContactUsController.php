<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\contact\ContactStoreRequest;
use App\Repositories\Interfaces\UserDashboard\ContactUsInterface;

class ContactUsController extends Controller
{

    protected $contact;
    public function __construct(ContactUsInterface $contact)
    {
        $this->contact = $contact;
    }

    public function index()
    {
        return view('userDashboard.contactUs.index');
    }


    public function store(ContactStoreRequest $request)
    {
        $this->contact->store($request->validated());
    }


}
