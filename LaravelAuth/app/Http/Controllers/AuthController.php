<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {


        $request->validate([
            'email' => 'email | required',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {

            return redirect('home');
        }
        // If Error
        return redirect('login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'email' => 'required | email',
            'password' => 'required|confirmed|min:6'
        ]);

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Mail::send('emails.registrationcomplete',$data->toArray(),function ($message) {
            $message->to('gauravp@zignuts.com', 'Gaurav');
            $message->subject('DEMO MAIL');
        });

        return redirect('login');
    }

    public function home()
    {
        return view('home');
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function sendMailForChangePassword(){
        $data = User::all();
        Mail::send('emails.changepassword', $data->toArray(), function ($message) {
            $message->to('gauravp@zignuts.com', 'Gaurav');
            $message->subject('Change The Password');
        });
        return redirect('home');
    }

    public function change_password()
    {
        return view('update_password');
    }

    public function update_password(Request $request)
    {
        $user = Auth::user();

        // echo $user->password;
        if(password_verify($request->oldpassword,$user->password)){
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->newpassword)
            ]);
            return redirect('home')->with('success','Password Updated');
        }
        else{
            echo "Old Password Not Matched";
        }
    }
}
