<?php

namespace App\Http\traits;
use App\Models\User;


trait QueryTrait
{
    public function getUserDetail($id)
    {
        $single = User::where('id',$id)->first();
        return $single;
    }
    public function getErrorMessage($validateUser){
        $error = response()->json([
            'status' => false,
            'message' => 'Validation Error',
            'data' => $validateUser->errors()
        ], 422);
        return $error;
    }
    public function LoginSuccess($token)
    {
        $success = response()->json([
            'message' => 'Login Successfully',
            'user' => auth()->user(),
            'token' => $token
        ],200);
        return $success;
    }
}


?>