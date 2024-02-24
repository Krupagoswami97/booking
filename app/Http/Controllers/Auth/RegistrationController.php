<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Validator;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $messages = [
            'first_name.required' => 'First Name field is required.',
            'last_name.required' => 'Last Name field is required.',
            'email.required' => 'Email field is required.',
            'email.unique' => 'This email is already taken.',
            'password.required' => 'Password field is required.'
        ];

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8', // You might want to set a minimum length for the password
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('do_login')->with('success', 'You are registered successfully.');

    }
}
