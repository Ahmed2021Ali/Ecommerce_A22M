<?php

namespace App\Http\Controllers;

use App\Jobs\SubscribeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SubScribeEmailConrtoller extends Controller
{
    public function SubscribeEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|min:11|max:50']);
        Auth::user()->update(['subscribeEmail' => 1]);
        SubscribeEmail::dispatch($request->email);
        return redirect()->back()->with('success', 'تم بنجاح اشتراكك في الخدمة الاخبارية ');
    }
}
