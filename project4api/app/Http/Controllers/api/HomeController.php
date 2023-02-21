<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\traits\QueryTrait;

use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    public function getData($id = null)
    {
        if ($id == null) {
            return User::all();
        }
        return User::find($id);
    }

    public function update(Request $request, $id = null)
    {
        if ($id == null) {
            return "record not found";
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $result = $user->save();
        if ($result) {
            return ["result" => "record updated successfully"];
        } else {
            return ["result" => "record not updated"];
        }
    }

    public function search($name = null)
    {
        $user = User::where('name', $name)->get();
        if (sizeof($user) > 0) {
            return $user;
        }
        return "No Record Found";
    }

    public function delete($id = null)
    {

        $user = User::where('id', $id)->get();
        if (sizeof($user) > 0) {
            User::where('id', $id)->delete();
            return "Record Deleted Successfully";
        }
        return "Record not found";
    }


    public function register(Request $request)
    {
        $data = $request->all();
        $validateData = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        if ($validateData->fails()) {
            return $validateData->errors();
        }
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        $token = $user->createToken('APITOKEN')->accessToken;

        return response([
            'message' => 'Data Inserted Successfully',
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
    use QueryTrait;

    public function traitData()
    {
        return $this->getUserDetail(2);
    }
}
