<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImBarangDetailModel extends Model
{
    use HasFactory;

    protected $table = "im_barang_detail";

    protected $fillable = [
        'varian',
        'qty',
        'harga_beli',
        'harga_jual',
        'id_barang',
        'flag',
        'action',
        'created_who',
        'last_update_who'
    ];

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_update';
}
