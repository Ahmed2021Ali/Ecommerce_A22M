<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Repositories\Interfaces\AdminDashboard\ContactUsInterface;

class ContactUsController extends Controller
{
    protected $contact;
    public function __construct(ContactUsInterface $contact)
    {
        $this->middleware('permission:الإستفسارات', ['only' => ['index']]);
        $this->middleware('permission:حذف الإستفسارات', ['only' => ['destroy']]);
        $this->contact = $contact;
        $this->middleware('checkAdminRole');
    }

    public function index()
    {
        return $this->contact->index();
    }

    public function destroy(ContactUs $contact)
    {
        return $this->contact->destroy($contact);
    }
}
