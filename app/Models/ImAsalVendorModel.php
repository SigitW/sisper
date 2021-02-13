<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImAsalVendorModel extends Model
{
    use HasFactory;

    protected $table = "im_asal_vendor";

    protected $fillable = [
        'nama',
        'tipe',
        'flag',
        'action',
        'created_who',
        'last_update_who'
    ];

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_update';
}
