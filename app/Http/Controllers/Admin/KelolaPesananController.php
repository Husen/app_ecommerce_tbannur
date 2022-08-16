<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;

class KelolaPesananController extends Controller
{
    public function index()
    {
        $data = Pesanan::where('status', '!=',0)->orderByDesc('id')->get();
        return view('admins.pesanan.data_pesanan',compact('data'));
    }
}
