<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index(){
        return view("home.index");
    }

    function dashboard(){
        return view("home.dashboard");
    }
}
