<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadBillingController extends Controller
{
    function index(){
    }

    function customerVerif(){
         // mendapatkan status terakhir
         $status = "verifikasi_pembayaran";

         if ($status == "verifikasi_pembayaran"){
             return view('uploadbilling.form');
         }

         if ($status == "verifikasi_pembelian"){
             return view('uploadbilling.formpembelian');
         }
    }
}
