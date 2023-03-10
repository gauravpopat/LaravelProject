<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::first();
        Notification::send($user, new WelcomeNotification);
        dd('Notification Send');
    }

    public function upload(Request $request)
    {
        $filename = time() . "myfile." . $request->file('file')->getClientOriginalExtension();
        $request->file('file')->storeAs('uploads', $filename);
        return redirect('upload')->with('success', 'Image Uploaded Successfully');
    }

    public function upload_image(Request $request)
    {
        $image = $request->file('image');
        $destinationPathImg = public_path('/images/');
        $filename = time() . "myfile." . $request->image->extension();

        if (!$image->move($destinationPathImg, $filename)) {
            return 'Error saving the file.';
        }

        Image::create([
            'name' => $request->name,
            'image' => $filename
        ]);
        return redirect('upload')->with('success', 'Data inserted successfully');
    }

    public function show()
    {
        $images = Image::all();
        return view('showdata', compact('images'));
    }

    public function delete($id){
        $image = Image::where('id',$id)->delete();
        return back()->with('success','record deleted successfully');
    }

    public function updateForm($id){
        $image = Image::where('id',$id)->first();
        return view('updateForm',compact('image'));
    }

    public function update_image(Request $request)
    {
        // $image = $request->file('image');
        // $destinationPathImg = public_path('/images/');
        // $filename = time() . "myfile." . $request->image->extension();

        // if (!$image->move($destinationPathImg, $filename)) {
        //     return 'Error saving the file.';
        // }

        // Image::create([
        //     'name' => $request->name,
        //     'image' => $filename
        // ]);
        return $request->name;

        return redirect('show')->with('success', 'Data Updated successfully');
    }

}
