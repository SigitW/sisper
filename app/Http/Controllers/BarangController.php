<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImBarangModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use stdClass;
use Throwable;

class BarangController extends Controller
{
    function index(){
        return view("barang.searchBarang");
    }

    function create(Request $req){

        $req->request->add(
            [
                'flag'=>'Y',
                'action'=>'C',
                'created_who'=>'admin',
                'last_update_who'=>'admin'
            ]
        );

        $input = $req->all();
        Log::info($input);
        try {
            ImBarangModel::create($input);
        } catch (Throwable $e){
            Log::error($e);
            return response()->json(["error"=>$e]);
        }
        return response()->json(["success"=>"Berhasil Tersimpan"]);
    }

    function search(Request $req){

        $nama = $req->input('nama');
        $listbarang = [];
        try {
            $listbarang = DB::table('im_barang')
            ->where('nama','LIKE','%'.$nama.'%')
            ->where('flag','=','Y')->get();
        } catch (Throwable $e){
            Log::error($e);
        }

        return response()->json($listbarang);
    }

    function edit(Request $r){
        // Log::info('EDIT ===============================================>>>> '.$r->input('id'));
        $id = $r->input("id");
        $barang = [];
        try {
            $barang = DB::table('im_barang')
            ->where('id','=', $id)->get();
        } catch (Throwable $e){
            Log::error($e);
        }
        return response()->json($barang);
    }

    function saveEdit(Request $r){
        $id = $r->input("id");

        $barang = ImBarangModel::where('id', $id)->first();
        $barang->nama_pembelian = $r->input('nama_pembelian');
        $barang->nama = $r->input('nama');
        $barang->id_vendor = $r->input('id_vendor');
        $barang->harga_default = $r->input('harga_default');
        $barang->margin = $r->input('margin');
        $barang->action = "U";
        $barang->created_who = "admin";
        $barang->last_update_who = "admin";

        try{
            $barang->save();
        } catch(Throwable $e){
            Log::error($e);
            return response()->json(["error"=>$e]);
        }
        return response()->json(["success"=>"Berhasil Tersimpan"]);
    }
}
