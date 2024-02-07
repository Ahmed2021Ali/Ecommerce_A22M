<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest'])->except('logout');
    }

    public function viewSignupForm()
    {
        return view('auth.signup');
    }

    public function submitSignup(UserRegisterRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create($validatedData);

        Auth::login($user);

        return redirect('/home');
    }

    public function viewSigninForm()
    {
        return view('auth.signin');
    }

    public function submitSignin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect('home');
        } else {
            // Authentication failed
            return back()->withInput()->withErrors(['email' => 'Invalid credentials']);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
