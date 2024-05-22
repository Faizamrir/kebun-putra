<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public function pembelian(){
        return $this->hasMany(detail_pembelian::class, 'no_produk', 'id');
    }

    public function keranjang(){
        return $this->hasMany(keranjang::class, 'no_produk', 'id');
    }

    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'img'
    ];
}
