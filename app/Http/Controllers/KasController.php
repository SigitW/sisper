<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasController extends Controller
{
    function index(){
        return view("kas.searchKas");
    }
}
