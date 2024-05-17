<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pembelian extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(product::class, 'no_produk', 'id');
    }

    public function pembelian(){
        return $this->belongsTo(pembelian::class, 'no_pembelian', 'id');
    }

    protected $fillable = [
        'no_pembelian',
        'no_produk',
        'jumlah'
    ];
}
