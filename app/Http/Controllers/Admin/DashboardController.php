<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('level', 'customer')->get();
        $total_user = count($user);

        $pesanan = Pesanan::where('transaction_status', 'SETTLEMENT')->get();
        $total_jual = count($pesanan);

        $pesanan = Pesanan::where('transaction_status', 'SETTLEMENT')->get();
        $saldos = [];
        foreach($pesanan as $p){
            $saldos[] = $p->Subtotal_harga;
        }
        $saldo = array_sum($saldos);

        return view('admins.dashboard', compact('total_user', 'total_jual', 'saldo'));
    }
}
