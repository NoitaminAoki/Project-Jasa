<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Member;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'required|string|max:199|unique:members',
            'noTelp' => 'required|string|max:25',
            'email' => 'required|string|email|max:255|unique:members',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $generateCode = 'id-'.Str::studly($request->name);
        Member::create([
            'code' => $generateCode,
            'name' => $request->name,
            'noTelp' => $request->noTelp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('member.login')->with('success','Registration Success');
    }

    public function login(Request $request)
    {
        if (auth()->guard('member')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active' ])) {
            return redirect(url('/member/dashboard'));
        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect(url('/'));
    }
}
