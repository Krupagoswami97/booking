<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'auth_check']]);
    }

    public function login(Request $request)
    {
        $data = $request->all();

        $validation = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validation->fails()) {
            $response = JsonResponse(false, 422, $validation->messages(), 'validation error', []);
            return response($response, 422);
        }

        if (!$token = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $response = JsonResponse(false, 422, [], 'invalid credentials.', []);
            return response($response, 422);
        }

        $response = JsonResponse(true, 200, [], 'successfully logged in.', [
            'token' => $token,
            'user' => auth()->user(),
        ]);

        return response($response, 200);

    }

    public function logout(Request $request)
    {
        auth()->logout();
        $response = JsonResponse(true, 200, [], 'successfully logout.', []);
        return response($response, 200);
    }

    public function auth_check(Request $request)
    {

        /*  $this->validate($request, [
        'token' => 'required'
        ]);
         */
        /* $user = Auth::authenticate($request->token); */

        if (auth('api')->check()) {
            $response = JsonResponse(true, 200, [], 'Token Valid.', ['data' => auth('api')->user()]);
            return response($response, 200);
        } else {
            $response = JsonResponse(false, 200, [], 'Token Expired.', []);
            return response($response, 200);
        }
    }
}
