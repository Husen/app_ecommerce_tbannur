<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KelolaKategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::all();
        return view('admins.kategori.data_kategori',compact('data'));
    }

    public function tambah_kategori(Request $request)
    {
        $data = new Kategori;
        $data->nama_kategori = $request->nama_kategori;
        $data->slug_kategori = Str::slug($request->nama_kategori, '-');
        $data->save();
        return redirect('admin/kelola_kategori')->with('toast_success', 'Data Kategori Berhasil Ditambah!');
    }

    public function update_kategori(Request $request)
    {
        $data = Kategori::find($request->id);
        $data->nama_kategori = $request->nama_kategori;
        $data->slug_kategori = Str::slug($request->nama_kategori, '-');
        $data->update();
        return redirect('admin/kelola_kategori')->with('toast_success', 'Data Kategori Berhasil Diubah!');
    }

    public function hapus_kategori(Request $request)
    {
        $data = Kategori::find($request->id);
        $data->delete($request->all());
        return redirect('admin/kelola_kategori')->with('toast_success', 'Data Kategori Berhasil Dihapus!');
    }
}
