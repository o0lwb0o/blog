<?php

namespace App\Http\Controllers\Admin;

use App\Extensions\AuthenticatesLogout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\ApiCode;

class LoginController extends Controller
{
    use AuthenticatesUsers;
//    use AuthenticatesUsers, AuthenticatesLogout {
//        AuthenticatesLogout::logout insteadof AuthenticatesUsers;
//    }


//    protected $redirectTo = '/admin';

    public function __construct()
    {

        $this->middleware('guest.admin', ['except' => 'logout']);
    }

    /**
     * 显示后台登录模板
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * 使用 admin guard
     */
    protected function guard()
    {

        return auth()->guard('admin');
    }

    /**
     * 重写验证时使用的用户名字段
     */
    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $res = array();
        $code = ApiCode::CODE_9999_TYPE;
        $url = url('admin/login');
        do {
            if (!$request->isMethod('post')) {
                $code = ApiCode::CODE_9999_TYPE;
                break;
            }
            $name = $request->input('name', '');
            $pwd = $request->input('password', '');
            $is = $request->input('rememberMe', 0);
            if (empty($name) || empty($pwd)) {
                $code = ApiCode::CODE_1002_TYPE;
                break;
            }
            if ( !Auth::guard('admin')->attempt(['username' => $name, 'password' => $pwd], !empty($is))) {
                $code = ApiCode::CODE_1001_TYPE;
                break;
            }
            $data = array();
            $data['login_at'] =

            $code = ApiCode::CODE_1000_TYPE;
            $url = url('/admin');
        }while(false);
        $res['code'] = $code;
        $res['msg'] = ApiCode::$msg[$code];
        $res['url'] = $url;
        $res['date'] = 2;
        return redirect('prompt')->with('list', $res);
    }


    /*
     *  退出登录
     */
    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return Redirect::to('login');
    }
}
