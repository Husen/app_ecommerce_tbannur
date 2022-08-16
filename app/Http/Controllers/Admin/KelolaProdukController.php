<?php

namespace App\Http\Controllers\Admin;

// for slug
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KelolaProdukController extends Controller
{
    public function index()
    {
        $data = Produk::orderByDesc('id')->get();
        $kategori = Kategori::all();
        return view('admins.produks.data_produk',compact('data', 'kategori'));
    }

    public function tambah(Request $request)
    {        
        $data = new Produk;
        $data->nama_produk = $request->nama_produk;
        $data->slug_produk = Str::slug($request->nama_produk, '-');
        $data->merk = $request->merk;
        $data->kategori_id = $request->kategori_id;
        $data->berat = $request->berat;
        $data->harga = $request->harga;
        $data->potongan_harga = $request->potongan_harga;
        $data->stok = $request->stok;
        $data->jenis_produk = $request->jenis_produk;
        $data->status_jual = 1;
        $data->deskripsi_produk = $request->deskripsi_produk;
        if($request->hasFile('gambar_produk'))
        {
            $request->file('gambar_produk')->move('img/produk/', $request->file('gambar_produk')->getClientOriginalName());
            $data->gambar_produk = $request->file('gambar_produk')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('kelola_produk')->with('toast_success', 'Data Produk Berhasil Ditambah!');
    }

    public function ubah_produk($id)
    {
        $produk = Produk::find($id);
        return view('admins.produks.ubah_produk',compact('produk'));
    }

    public function update_produk(Request $request, $id)
    {
        $data = Produk::find($id);
        $data->update($request->all());
        return redirect()->route('kelola_produk')->with('success','Data Produk Berhasil Diubah');        
    }

    public function hapus_produk(Request $request, $id)
    {
        $data = Produk::find($id);
        $data->delete($request->all());
        return redirect()->route('kelola_produk')->with('toast_success', 'Data Produk Berhasil Dihapus!');
    }

    // public function hapus_produk($id)
    // {
    //     $data = Produk::find($id);
    //     $data->delete();
    //     return redirect()->route('kelola_produk');
    // }

}
