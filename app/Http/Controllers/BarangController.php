<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    function barang(){
        return view("barang.searchBarang");
    }
}
