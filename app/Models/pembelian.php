<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_pembelian',
        'tgl_pembayaran',
        'status_pembayaran',
        'detail_pembelian',
        'total'
    ];
}
