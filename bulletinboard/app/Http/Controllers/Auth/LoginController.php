<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username(){
        return 'name';
    }

    public function sendFailedLoginResponse(Request $request){
        $credentials = $request->validate([
            'name' => ['required', 'unique:users'],
            'password' => ['required'],
        ]);
        User::create([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password'))
        ]);
        if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect('/');
    }
    }
    public function authenticated(Request $request, $user)
    {
        redirect('/');
    }
}
