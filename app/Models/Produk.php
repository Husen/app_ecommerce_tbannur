<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Keranjang;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function kategori()
    {
          return $this->belongsTo(Kategori::class);
    }

    public function keranjang()
    {
       return $this->hasMany(Keranjang::class);
    }
}
