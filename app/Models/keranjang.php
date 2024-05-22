<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'no_produk', 'id');
    }

    protected $fillable = [
        'id_user',
        'no_produk',
        'jumlah'
    ];
}
