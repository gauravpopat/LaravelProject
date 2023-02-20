<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        $token = $user->createToken('APITOKEN')->accessToken;

        return response([
            'messagea' => 'Data Inserted Successfully',
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) {
            return response(['error_message' => 'Incorrect Details']);
        }

        $token = auth()->user()->createToken('APITOKEN')->accessToken;
        
        return response([
            'message' => 'Login Successfully',
            'user' => auth()->user(),
            'token' => $token
        ]);
    }
}
