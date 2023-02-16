<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;
class HomeController extends Controller
{
    public function index()
    {
        $user = User::first();
        Notification::send($user, new WelcomeNotification);
        dd('Notification Send');
    }

    public function upload(Request $request){
        $filename = time()."myfile.".$request->file('file')->getClientOriginalExtension();
        $request->file('file')->storeAs('uploads',$filename);
        return redirect('upload')->with('success','Image Uploaded Successfully');
    }
}
