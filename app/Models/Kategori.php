<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Kategori extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function Produk()
    {
          return $this->hasMany(Produk::class);
    }
}
