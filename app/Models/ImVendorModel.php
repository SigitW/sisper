<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImVendorModel extends Model
{
    use HasFactory;

    protected $table = "im_vendor";

    protected $fillable = [
        'nama',
        'alamat',
        'id_asal_vendor',
        'flag',
        'action',
        'created_who',
        'last_update_who'
    ];

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_update';
}
