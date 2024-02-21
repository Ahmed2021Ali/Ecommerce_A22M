<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\contact\ContactRequest;
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
        return $this->contact->index();
    }


    public function store(ContactRequest $request)
    {
        return $this->contact->store($request->validated());
    }


}
