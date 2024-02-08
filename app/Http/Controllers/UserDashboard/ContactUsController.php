<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Repositories\Interfaces\AdminDashboard\ContactUsInterface;
use Illuminate\Http\Request;

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

    public function destroy(ContactUs $contact)
    {
        return $this->contact->destroy($contact);
    }
}
