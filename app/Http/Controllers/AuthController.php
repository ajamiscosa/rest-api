<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function login()
    {
        $credentials = [
            'email' => request('email'),
            'password' => request('password')
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('RestApi')->accessToken;
            return $this->sendResponse($token);
        } else {
            return $this->sendError('Unauthorized.', [], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation error.', $validator->errors(), 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $token = $user->createToken('RestApi')->accessToken;
        return $this->sendResponse($token);
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::user()->authAcessToken()->delete();
            return $this->sendResponse(null, 'User logged out.');
        }
        return $this->sendError('Unauthorized.', [], 401);
    }

    public function profile()
    {
        $user = Auth::user();
        return $this->sendResponse($user);
    }
}
