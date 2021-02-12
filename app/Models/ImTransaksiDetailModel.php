<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImTransaksiDetailModel extends Model
{
    use HasFactory;

    protected $table = "im_transaksi_detail";

    protected $fillable = [
        'kode_rekening_id',
        'trans_id',
        'posisi',
        'is_vendor_exist',
        'is_mutiple_item',
        'flag',
        'action',
        'created_who',
        'last_update_who'
    ];

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_update';
}
