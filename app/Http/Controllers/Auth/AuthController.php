<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SigninRequest;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;

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

        Auth::user()->update(['last_login_at' => now()]);

        return to_route('home');
    }


    public function viewSigninForm()
    {
        return view('auth.signin');
    }


    public function submitSignin(SigninRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {

            Auth::user()->update(['last_login_at' => now()]);
            
            // Check if the user has either 'manager' or 'admin' role
            if (Auth::user()->hasRole(['المدير', 'ادمن'])) {
                toastr()->success('تم تسجيل الدخول');
                return to_route('admin.dashboard');
            } else {
                toastr()->success('تم تسجيل الدخول');
                return to_route('home');
            }
        } else {
            toastr()->error('البيانات غير صحيحة');
            return back()->withInput()->withErrors(['email' => 'البيانات غير صحيحة']);
        }

    }


    public function logout()
    {
        Auth::logout();
        toastr()->success('تم تسجيل الخروج');
        return to_route('home');
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
            $user = User::create([
                'provider' => $provider, 'provider_id' => $socialite->getId(),
                'name' => $socialite->getName(), 'email' => $socialite->getEmail(),
            ]);
            $defaultRoles = ['user', 'User'];
            $defaultRole = Role::whereIn('name', $defaultRoles)->first();
            if ($defaultRole) {
                $user->assignRole($defaultRole);
            }
        }
        Auth::login($user, true);
        toastr()->success('تم تسجيل الدخول');
        return redirect('home');
    }
}
