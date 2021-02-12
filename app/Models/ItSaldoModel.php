<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItSaldoModel extends Model
{
    use HasFactory;

    protected $table = "it_saldo";

    protected $fillable = [
        'kode_rekening_id',
        'coa',
        'periode',
        'jumlah',
        'flag',
        'action',
        'created_who',
        'last_update_who'
    ];

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_update';
}
