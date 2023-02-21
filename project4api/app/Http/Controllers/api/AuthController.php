<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function createUser(Request $request)
    {
        $validateUser = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'data' => $validateUser->errors()
            ], 401);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $user->createToken('API Sanctum Token')->plainTextToken
        ], 200);
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
        $id = auth()->user()->getAuthIdentifier();
        $token = User::find($id)->createToken('API Sanctum Token')->plainTextToken;

        return response([
            'message' => 'Login Successfully',
            'user' => auth()->user(),
            'token' => $token
        ]);
    }
    public function upload(Request $request)
    {
       $result = $request->file('jpgfile')->store('myfiles');
       return ["result"=>$result];
    }
}
