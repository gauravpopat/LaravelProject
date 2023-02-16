<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileStorageController extends Controller
{
    public function filestorage(Request $request)
    {
        // Create new folder
        // Storage::makeDirectory('laravel-developer');
        // return redirect('upload');



        // Store files inside the folder
        // $filename = time()."myfile.".$request->file('file')->extension();
        // Storage::putFileAs('laravel-developer',$request->file,$filename);
        // return redirect('upload')->with('success','File is stored inside the folder');



        // Copy file to another directory
        // Storage::copy('laravel-developer/1676543714myfile.png','public/1676543714myfile.png');
        // return redirect ('upload')->with('success','file  copy  successfull');


        // Cut file
        // Storage::move('laravel-developer/1676543714myfile.png','public/1676543714myfile.png');
        // return redirect ('upload')->with('success','file  move  successfull');


        // List field or sub files include folder
        // $files= Storage::files('public');
        // dd($files);


        //Show file
        // $filename = time()."myfile.".$request->file('file')->getClientOriginalExtension();
        // Storage::putFileAs('laravel-developer',$request->file,$filename);
        // $data = Storage::get('laravel-developer/'.$filename);
        // return redirect('upload')->with('data',$data);

        $file = $request->file('file');

        // return $file->getClientOriginalExtension();
        // return $file->getClientOriginalName();
        // return $file->hashName();
        // return $file->extension();


        //Download file
        // $filename = time()."myfile.".$request->file('file')->getClientOriginalExtension();
        // Storage::putFileAs('laravel-developer',$request->file,$filename);
        // Storage::download('laravel-developer/'.$filename);
        // return redirect('upload')->with("d");


        //Delete file
        // Storage::delete('laravel-developer/1676543714myfile.png');
        // return redirect('upload')->with('success','Delete successfully');


        //Delete folder
        // Storage::deleteDirectory('laravel-developer');
        // return redirect('upload')->with('success','Delete successfully');
    }
}
