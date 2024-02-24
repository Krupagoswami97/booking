<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller
{
    

    public function index()
    {
        if(session('api_token') || session('user_details'))
        {
            return redirect()->route('main_dashboard');
        }
        return view('auth.login');
    }
    public function register()
    {
        if(session('api_token') || session('user_details'))
        {
            return redirect()->route('main_dashboard');
        }
        return view('auth.register');
    }
    public function do_login(Request $request)
    {
        \Session::put('api_token', 'Bearer '.$request->user_token);
        \Session::put('user_details', $request->user);
        $response = JsonResponse(true, 200, '', 'Successfully Logged In', []);
        return response($response, 200);
    }
    public function admin_logout(Request $request)
    {
        //login_log_activity($request->session()->get('user_details')['id'],true);
        $request->session()->flush();
        if($request->ajax())
        {
            Auth::guard('api')->logout();
            $response = JsonResponse(true, 200, [], 'successfully logout.', []);
            return response($response, 200);
        }
        return redirect()->route('login');
    }
    public function session_check(Request $request)
    {
        print_r($request->session()->get('api_token'));
        $request->session()->flush();
        //JWTAuth::invalidate($request->session()->get('api_token'));
        return;
    }
}
