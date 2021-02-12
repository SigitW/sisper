<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImKodeRekeningModel extends Model
{
    use HasFactory;

    protected $table = "im_kode_rekening";

    protected $fillable = [
        'nama',
        'coa',
        'flag',
        'action',
        'created_who',
        'last_update_who'
    ];

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_update';
}
