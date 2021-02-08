<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    function index(){
        return view("barang.searchBarang");
    }
}
