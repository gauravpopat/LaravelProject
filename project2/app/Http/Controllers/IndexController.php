<?php

namespace App\Http\Controllers;
use App\Models\Phone;
use App\Models\Person;
use Illuminate\Http\Request;
class IndexController extends Controller
{
    public function index(){
        //$phone = Person::find(3)->phone;
        //return $phone;
        $person = Phone::find(2)->person;
        return $person;

    }
}
