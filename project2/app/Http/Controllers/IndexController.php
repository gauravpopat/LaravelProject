<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Phone;
use App\Models\Person;
use App\Models\Singer;
use App\Models\Song;
use App\Models\Comment;
use App\Models\Video;
use App\Models\Post;

use Illuminate\Http\Request;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;

class IndexController extends Controller
{
    public function index()
    {
        return view('myform');
    }

    public function register(Request $request){
       $request->validate([
            'name'=> 'required',
            'email'=> 'email | required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password'=> 'required'
       ]);
        dd($request->all());
    }
    public function postcomment($id){
        return Post::find($id)->comments;
    }

    public function videocomment($id){
        return Video::find($id)->comments;
    }


    public function onetoone(){
        $phone = Person::find(3)->phone11;
        return $phone;
    }

    public function onetomany(){
        $phone = Person::find(2)->phone12;
        return $phone;
    }

    public function onetomanybelongsto(){
        //return Phone::find(2);
        $person = Phone::find(3)->getPerson;
        return $person;
    }

    public function latestOrder(){
        $order = Customer::find(2)->getLatestOrder;
        return $order;
    }

    //Has One Of Many

    public function maxPrice()
    {
        $maxorder = Customer::find(1)->getMaxOrder;
        return $maxorder;
        //return "Ord Name : ".$maxorder->order_name."<br>Max Price : ".$maxorder->price;
    }

    public function minPrice(){
        $minprice = Customer::find(1)->getMinOrder;
        return "Ord Name : ".$minprice->order_name."<br>Min Price : ".$minprice->price;
    }

    public function getCreator(){
        $creator = Customer::find(1)->getCreator;
        return $creator;
    }

    public function getCreatorHasManyThrow()
    {
        $creator = Customer::find(1)->getCreatorHasManyThrow;
        return $creator;
    }

    public function show_song($id)
    {
        $song = Singer::find($id)->songs;
        return $song;
    }

    public function show_singer($id){
        $singer = Song::find($id)->singer;
        return $singer;
    }


}
