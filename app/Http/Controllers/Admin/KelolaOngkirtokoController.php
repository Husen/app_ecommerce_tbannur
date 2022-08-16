<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;

class KelolaOngkirtokoController extends Controller
{
    public function index()
    {
        $data = Kecamatan::all();
        return view('admins.ongkir_toko.data_ongkir',compact('data'));
    }

    public function tambah_ongkir(Request $request)
    {
        $data = Kecamatan::create($request->all());
        return redirect('admin/kelola_ongkir')->with('toast_success', 'Data Kecamatan Berhasil Ditambah!');
    }

    public function update_ongkir(Request $request)
    {
        $data = Kecamatan::find($request->id);
        $data->update($request->all());
        return redirect('admin/kelola_ongkir')->with('toast_success', 'Data Kecamatan Berhasil Diubah!');
    }

    public function hapus_ongkir(Request $request)
    {
        $data = Kecamatan::find($request->id);
        $data->delete($request->all());
        return redirect('admin/kelola_ongkir')->with('toast_success', 'Data Kecamatan Berhasil Dihapus!');
    }
}
