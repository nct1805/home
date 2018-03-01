<?php

namespace App\Http\Controllers\admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\User;
use App\Validate\admin\LoginValidate;
use App\Validate\admin\UserValidate;
use App\Models\admin\UsersModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


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
        if(Auth::attempt(['email' => $email, 'password' => $password], $remember)){
            // lấy dữ liệu user login
            $query = DB::table('users');
            $query->where('email', '=', $email);
            $data_users = $query->select('group_id')->get();
            $group_id = $data_users[0]->group_id;

            $query_last = DB::table('permission');
            $query_last->where('admin_group_id', '=', $group_id);
            $data_permision = $query_last->select('admin_group_id','modules_id','_view','_delete','_add','_edit')->get();
            $data_session = array();
            if(count($data_permision) > 0 ){
                foreach ($data_permision as $value) {
                    $data_sessions['admin_group_id'] = $value->admin_group_id;
                    $data_sessions['modules_id'] = $value->modules_id;
                    $data_sessions['_view'] = $value->_view;
                    $data_sessions['_delete'] = $value->_delete;
                    $data_sessions['_add'] = $value->_add;
                    $data_sessions['_edit'] = $value->_edit; 
                    $data_session[] = $data_sessions; 
                }
            }
            session(['data_session' => $data_session]);
            return redirect()->route('products_list');
        } else {
            return redirect()->route('admin_login');
        }       
    }
    public function logout(Request $request)
    {
        $request->session()->forget('data_session');
        Auth::logout();
        return redirect()->route('admin_login');
    }
}
