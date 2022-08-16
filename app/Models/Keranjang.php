<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\Pesanan;

class Keranjang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function produk()
    {
          return $this->belongsTo(Produk::class);
    }

    public function pesanan()
    {
          return $this->belongsTo(Pesanan::class);
    }

    
}
