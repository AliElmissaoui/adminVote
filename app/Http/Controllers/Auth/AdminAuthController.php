<?php

namespace App\Http\Controllers\Auth;

use Validator;
use Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Admin;

class AdminAuthController extends Controller
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
    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session()->flush();
        $this->middleware('guest', ['except' => 'logout']);

    }

    public function getLogin()
    {
        return view('auth.admin.login');
    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('admin')->user();


            return redirect()->route('dashboard');

        } else {
            return back()->with('error','your username and password are wrong.');
        }

    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {

        Session::flush();
        return redirect()->route('adminLogin');
    }
}
