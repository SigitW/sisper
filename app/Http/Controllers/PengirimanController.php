<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    function index(){
        return view("pengiriman.searchPengiriman");
    }
}
