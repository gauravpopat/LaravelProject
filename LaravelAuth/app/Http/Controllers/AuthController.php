<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\EmailVerificationMail;
use App\Mail\ResetPasswordMail;
use Illuminate\Auth\Notifications\ResetPassword;
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
            'email' => 'required | email',
            'password' => 'required',
        ]);
        //get the email value from the table if it is null then it will return the user not found
        $user = User::where('email', $request->email)->pluck('email');
        $data = $user->toArray();

        if (empty($data)) {
            return redirect('login')->with('error', 'User Not Found')->withInput();
        } else {
            $cred = $request->only('email', 'password');
            $getverat = User::where('email', $request->email)->pluck('email_verified_at')->first();
            if(empty($getverat)){
                return redirect('login')->with('error', 'Email is not verified');
            }
            else{
                if (Auth::attempt($cred)) {
                    return redirect('home');
                }
                return redirect('login')->with('error', 'Password Incorrect')->withInput();
            }
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

        Mail::to($request->email)->send(new EmailVerificationMail($data));
        return redirect('login')->with('success', 'Verfification Mail Sent, Please verify it!');
    }

    public function verify_email($verificaton_code)
    {
        $user = User::where('email_verification_code', $verificaton_code)->first();
        if ($user) {
            if ($user->email_verified_at) {
                return redirect()->route('login')->with('error', $user->email.' Already Verified.');
            } else {
                $user->update([
                    'email_verified_at' => \Carbon\Carbon::now()
                ]);
                return redirect()->route('login')->with('success', 'Email Verified Successfully');
            }
        } else {
            return redirect()->route('register')->with('error', 'Some Error');
        }
    }

    public function home()
    {
        if (Auth::check()) {
            return view('home');
        }
        return redirect('login')->with('error', 'First fill up details and log in...');
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login')->with('success', 'Log out successfully');
    }



    //change password
    public function resetPassword()
    {
        return view('auth.passwords.reset_password');
    }

    public function resetpwd(Request $request)
    {
        $check = User::where('email', $request->email)->first();
        if ($check) {
            $check->update([
                'reset_password_code' => Str::random(40)
            ]);
            $data = $check->get('reset_password_code')->first();
            Mail::to($request->email)->send(new ResetPasswordMail($data));
            return redirect()->route('login')->with('success', 'Email has been sent check it!');
        } else {
            return redirect()->route('login')->with('error', 'No Record Found');
        }
    }

    public function reset_password($reset_password_code)
    {
        $user = User::where('reset_password_code', $reset_password_code)->first();

        if ($user) {
            return view('reset_view', compact('user'));
        } else {
            return redirect('login')->with('error', 'Some Error');
        }
    }

    public function changemypassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $update = $user->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('login')->with('success', 'Password Changed Successfully');
    }
}
