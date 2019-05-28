<?php

namespace App\Http\Controllers\Auth;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class MemberLoginController extends Controller
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
    
    protected $guard = 'member';

    protected $redirectTo = '/member/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.memberLogin');
    }
    
    public function guard()
    {
        return auth()->guard('member');
    }

    public function showRegisterPage()
    {
        return view('auth.memberRegister');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:199',
            'email' => 'required|string|email|max:255|unique:members',
            'password' => 'required|string|min:6|confirmed'
        ]);
        Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('member.login')->with('success','Registration Success');
    }

    public function login(Request $request)
    {
        if (auth()->guard('member')->attempt(['email' => $request->email, 'password' => $request->password ])) {
            return redirect(url('/member/dashboard'));
        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }
}
