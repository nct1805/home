<?php

namespace App\Http\Controllers\admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\User;
use App\Validate\admin\LoginValidate;
use App\Validate\admin\UserValidate;


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
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //$this->middleware('guest', ['except' => 'logout']);
    }
    public function login(){
        return view('admin.layouts.login');
    }
    public function authenticate(LoginValidate $request)
    {
       $requestDatas = $request->only('email', 'password', 'remember');
       $email = $requestDatas['email'];
        $password = $requestDatas['password'];
        $remember = $requestDatas['remember'] == 'on' ? true : false;
        if(Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect()->route('products_list');
        } else {
            return redirect()->route('admin_login');
        }       
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin_login');
    }
}
