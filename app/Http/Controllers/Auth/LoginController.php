<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated()
    {
        $user = auth()->user();
        $user->last_login_at = Carbon::now();
        $user->save();
        return redirect('/')->with('success',' You have logged in. ');
    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        $user->last_logout_at = Carbon::now();
        $user->save();

        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/')->with('success',' You have logged out. ');

    }
}
