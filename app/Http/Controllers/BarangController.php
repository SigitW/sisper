<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImBarangModel;
use App\Models\ImBarangDetailModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\ItTransaksiModel;
use App\Models\ItSaldoModel;
use Illuminate\Support\Arr;
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

    function selVendor(){
        $list = [];
        try {
            $list = DB::table('im_vendor')
            ->where('flag','=','Y')->get();
        } catch (Throwable $e){
            Log::error($e);
        }
        return response()->json($list);
    }

    function saveAddVarian(Request $req){

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
            ImBarangDetailModel::create($input);
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
            $listbarang = DB::table('im_barang AS br')
            ->join('im_vendor AS v','v.id','=', 'br.id_vendor')
            ->select('br.*','v.nama AS nama_vendor')
            ->where('br.nama','LIKE','%'.$nama.'%')
            ->where('br.flag','=','Y')->get();
        } catch (Throwable $e){
            Log::error($e);
        }

        return response()->json($listbarang);
    }

    function searchVarian(Request $req){
        $nama = $req->input('nama');
        $listbarang = [];
        try {
            $listbarang = DB::table('im_barang AS br')
            ->join('im_barang_detail AS bd', 'br.id', '=', 'bd.id_barang')
            ->select(
                'br.nama_pembelian', 'br.nama', 'br.id_vendor', 'br.margin', 'br.harga_default', 'bd.*'
            )
            ->where('br.nama','LIKE','%'.$nama.'%')
            ->where('br.flag','=','Y')
            ->where('bd.flag','=','Y')
            ->get();
        } catch (Throwable $e){
            Log::error($e);
        }
        return response()->json($listbarang);
    }

    function edit(Request $r){
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

    function editVarian(Request $r){
        $id = $r->input("id");
        $listbarang = [];
        try {
            $listbarang = DB::table('im_barang as br')
            ->join('im_barang_detail as bd', 'br.id', '=', 'bd.id_barang')
            ->select(
                'br.nama_pembelian', 'br.nama', 'br.id_vendor', 'br.margin', 'br.harga_default', 'bd.*'
            )
            ->where('bd.id','=', $id)
            ->where('br.flag','=','Y')
            ->where('bd.flag','=','Y')
            ->get();
        } catch (Throwable $e){
            Log::error($e);
        }
        return response()->json($listbarang);
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

    function saveEditVarian(Request $r){
        $id = $r->input("id");
        $barang = ImBarangDetailModel::where('id', $id)->first();
        $barang->varian = $r->input('varian');
        $barang->id_barang = $r->input('id_barang');
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

    function savePembelian(Request $r){
        Log::info($r);
        $date  = date('Ymd');
        $count = DB::table('it_transaksi')->count();
        $noref = "" .$date. "" .$count;

        // $size = count(collect($r)->get('id'));
        $size = count(collect($r->input('data')));
        $trans_id = $r->input('data.0.trans_id');

        // mendapatkan master transaksi dan detail;
        $listmapping = DB::table('im_transaksi_detail')->where('trans_id','=','$trans_id')->get();
        $datatrans = DB::table('im_transaksi')->where('id','=',$trans_id)->first();
        if ($datatrans == null){
            return response()->json(["error"=>"Tidak ditemukan data trans trans_id = ".$trans_id]);
        }
        $is_pembelian = $datatrans->tipe == "pembelian_barang_jualan";

        for ($i = 0; $i < $size ; $i++){

            // $detail     = $r->input('detail.'.$i);
            $input      = $r->input('data.'.$i);
            $nama       = $r->input('data.'.$i.'.nama');
            $id_item    = $r->input('data.'.$i.'.id_item');
            $jumlah     = $r->input('data.'.$i.'.jumlah');
            $koderek    = $r->input('data.'.$i.'.kode_rekening_id');
            $posisi     = $r->input('data.'.$i.'.posisi');
            $qty        = $r->input('detail.'.$i.'.qty');
            $harga      = $r->input('detail.'.$i.'.harga');
            Log::info('$qty = '.$qty);


            $input = Arr::add($input, 'flag','Y');
            $input = Arr::add($input, 'nama', $nama. " " .$harga. "@" .$qty);
            $input = Arr::add($input, 'action','C');
            $input = Arr::add($input, 'created_who','Admin');
            $input = Arr::add($input, 'last_update_who','Admin');
            $input = Arr::add($input, 'no_ref',$noref);

            try {
                ItTransaksiModel::create($input);
            } catch (Throwable $e){
                Log::error($e);
                return response()->json(["error"=>$e]);
            }

            // insert into saldo, START
            $periode = date('Ym');

            // cari saldo terakhir
            $saldofound = DB::table('it_saldo')->where('kode_rekening_id','=',$koderek)->latest('created_date')->first();

            if ($saldofound != null){

                // jika ditemukan data pada saldo maka insert berdasarkan saldo terakhir
                $posisi_lama = $saldofound->posisi;
                $saldo_lama = $saldofound->jumlah;
                $posisi_baru = "";
                $jumlah_baru = 0;

                if($posisi_lama == "D" && $posisi == "K"){
                    if ($saldo_lama > $jumlah){
                        $jumlah_baru = $saldo_lama - $jumlah;
                        $posisi_baru = $posisi_lama;
                    } else {
                        $jumlah_baru = $jumlah - $saldo_lama;
                        $posisi_baru = $posisi;
                    }
                }

                if($posisi_lama == "K" && $posisi == "D"){
                    if ($saldo_lama > $jumlah){
                        $jumlah_baru = $saldo_lama - $jumlah;
                        $posisi_baru = $posisi_lama;
                    } else {
                        $jumlah_baru = $jumlah - $saldo_lama;
                        $posisi_baru = $posisi;
                    }
                }

                $saldo = [
                    'kode_rekening_id' => $koderek,
                    'coa' => '',
                    'periode' => $periode,
                    'posisi' => $posisi_baru,
                    'jumlah' => $jumlah_baru,
                    'flag' => 'Y',
                    'action' => 'U',
                    'created_who' => 'Admin Pembelian',
                    'last_update_who' => 'Admin Pembelian'
                ];

                try {
                    ItSaldoModel::create($saldo);
                } catch (Throwable $e){
                    Log::error($e);
                    return response()->json(["error"=>$e]);
                }

            } else {

                // jika tidak ada history saldo;
                $saldo = [
                    'kode_rekening_id' => $koderek,
                    'coa' => '',
                    'periode' => $periode,
                    'posisi' => $posisi,
                    'jumlah' => $jumlah,
                    'flag' => 'Y',
                    'action' => 'U',
                    'created_who' => 'Admin Pembelian',
                    'last_update_who' => 'Admin Pembelian'
                ];

                try {
                    ItSaldoModel::create($saldo);
                } catch (Throwable $e){
                    Log::error($e);
                    return response()->json(["error"=>$e]);
                }
            }
            // END

            // jika pembelian
            Log::info('$is_pembelian = '.$is_pembelian);
            if ($is_pembelian == '1'){

                // jika item
                $is_item = $id_item != null && $id_item != "";
                Log::info('$id_item = '.$id_item);
                Log::info('$is_item = '.$is_item);
                if ($is_item == '1'){
                    $barang = ImBarangDetailModel::where('id', $id_item)->first();
                    $qty_lama = $barang->qty;
                    $qty_baru = $qty_lama + $qty;
                    $barang->qty                = $qty_baru;
                    $barang->harga_beli         = $harga;
                    $barang->action             = "U";
                    $barang->last_update_who    = "Admin Pembelian";
                    Log::info('$qty_lama = '.$qty_lama);
                    Log::info('$qty_baru = '.$qty_baru);
                    Log::info('$barang = '.$barang);
                    try {
                        $barang->save();
                    } catch (Throwable $e){
                        Log::error($e);
                        return response()->json(["error"=>$e]);
                    }
                }
            }
        }
        return response()->json(["success"=>"Berhasil Tersimpan"]);
    }

    function searchDetail(Request $req){
        $nama = $req->input('nama');
        $vendor = $req->input('vendor');

        if($nama == null || $nama == ""){
            $nama = "%";
        }

        if($vendor == null || $vendor == ""){
            $vendor = "%";
        }

        $listbarang = [];
        try {
            $listbarang = DB::table('im_barang AS br')
            ->join('im_barang_detail AS bd', 'br.id', '=', 'bd.id_barang')
            ->join('im_vendor AS v', 'v.id', '=', 'br.id_vendor')
            ->select(
                'br.nama_pembelian', 'br.nama', 'br.id_vendor', 'br.margin', 'br.harga_default', 'v.nama AS nama_vendor', 'bd.*'
            )
            ->where('br.nama','LIKE','%'.$nama.'%')
            ->where('v.nama','LIKE','%'.$vendor.'%')
            ->where('br.flag','=','Y')
            ->where('bd.flag','=','Y')
            ->get();
        } catch (Throwable $e){
            Log::error($e);
        }
        return response()->json($listbarang);
    }
}
