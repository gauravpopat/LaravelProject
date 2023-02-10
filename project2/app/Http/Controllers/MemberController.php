<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return Member::all();
    }

    public function accessor()
    {
        //return Member::find(1)->name;
        return Member::find(1)->city_name;
    }

    public function casting()
    {
        return Member::all();
    }
}
