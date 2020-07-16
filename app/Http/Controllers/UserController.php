<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController
{
    public function login() {
        $data = [
            'email' => request('email'),
            'password' => request('password')
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();

            $loginData['token'] = $user->createToken('testToken')->accessToken;

            return response()->json([
                'data' => $loginData,
                'message' => 'Welcome'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Error while login'
            ], 401);
        }
    }

    public function register(Request $request) {
        $data = $request->all();

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        $loginData['token'] = $user->createToken('testToken')->accessToken;

        return response()->json([
            'data' => $loginData,
            'message' => 'Welcome, thanks for register'
        ], 200);
    }
}
