<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
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

        /* socialite with Facebook , Google , GitHub  */
        public function loginWith($provider)
        {
            return Socialite::driver($provider)->redirect();
        }

        public function redirect($provider)
        {
            $socialite = Socialite::driver($provider)->stateless()->user();
            $user = User::where('email', $socialite->getEmail())->first();
            if (!$user) {
                $user = User::updateOrCreate([
                    'provider' => $provider,
                    'provider_id' => $socialite->getId(),
                ], [
                    'name' => $socialite->getName(),
                    'email' => $socialite->getEmail(),
                ]);
            }
            Auth::login($user, true);
            return to_route('homepage');
        }
}
