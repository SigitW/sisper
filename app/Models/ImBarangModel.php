<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImBarangModel extends Model
{
    use HasFactory;

    protected $table = "im_barang";

    protected $fillable = [
        'nama',
        'nama_pembelian',
        'harga_default',
        'margin',
        'id_vendor',
        'flag',
        'action',
        'created_who',
        'last_update_who'
    ];

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_update';
}
