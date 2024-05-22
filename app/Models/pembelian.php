<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function detail_pembelian(){
        return $this->hasMany(detail_pembelian::class, 'no_pembelian', 'id');
    }

    protected $fillable = [
        'id_user',
        'tgl_pembelian',
        'tgl_pembayaran',
        'status_pembayaran',
        'detail_pembelian',
        'total'
    ];
}
