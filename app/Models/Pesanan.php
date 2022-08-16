<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Keranjang;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() 
    {
         return $this->belongsTo(User::class);
    }

    // public function keranjang() 
    // {
    //      return $this->hasMany(Keranjang::class);
    // }
}
