<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItTransaksiModel extends Model
{
    use HasFactory;

    protected $table = "it_transaksi";

    protected $fillable = [
        'kode_rekening_id',
        'trans_id',
        'id_item',
        'id_vendor',
        'posisi',
        'jumlah',
        'flag',
        'action',
        'created_who',
        'last_update_who'
    ];

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_update';
}
