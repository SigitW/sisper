<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    function index(){
        return view("verifikasi.searchVerifikasi");
    }
}
