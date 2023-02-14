<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\EmailVerificationMail;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Str;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;

use function PHPUnit\Framework\isNull;

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
        //get the email value from the table if it is null then it will return the user not found
        $user = User::where('email', $request->email)->pluck('email');
        $data = $user->toArray();




        if (empty($data)) {
            return redirect('login')->with('error', 'User Not Found');
        } else {
            $cred = $request->only('email', 'password');
            if (Auth::attempt($cred)) {
                return redirect('home');
            }
            return redirect('login')->with('error', 'wrong detail');
            // $ev = User::where('email', $request->email)->pluck('email_verified_at');
            // $eml = $ev->toArray();
            // if(empty($eml)){
            //     return redirect()->route('login')->with('error', 'Email not verified');
            // }
            // else{
            //     $pw = User::where('email',$request->email)->pluck('password');
            //     if(password_verify($request->password,$user->password)){
            //         return redirect('home');
            //     }
            //     else{
            //         return redirect('login')->with('error','Wrong Details');
            //     }
            // }
        }
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
            'password' => Hash::make($request->password),
            'email_verification_code' => Str::random(40)
        ]);

        Mail::to('gauravp@zignuts.com')->send(new EmailVerificationMail($data));
        return redirect('login');
    }

    public function verify_email($verificaton_code)
    {
        $user = User::where('email_verification_code', $verificaton_code)->first();
        if ($user) {
            if ($user->email_verified_at) {
                return redirect()->route('register')->with('error', 'Already Verified');
            } else {
                $user->update([
                    'email_verified_at' => \Carbon\Carbon::now()
                ]);
                return redirect()->route('register')->with('success', 'Email Verified Successfully');
            }
        } else {
            return redirect()->route('register')->with('error', 'Incorrect URL');
        }
    }

    public function home()
    {
        if(Auth::check()){
            return view('home');
        }
        return redirect('login')->with('error','First fill up details and log in...');
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }



    //change password
    public function resetPassword()
    {
        return redirect()->route('login')->with('success','Email Has Been Sent for Reset Password, Check It!');
    }

}
