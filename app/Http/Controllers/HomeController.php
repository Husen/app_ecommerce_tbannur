<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\User;

use Auth;

class HomeController extends Controller
{
        
    public function index(Request $request)
    {        

        if($request->has('search')){
            $produk = Produk::where('status_jual', '1')->where('nama_produk','LIKE','%' .$request->search.'%')->paginate(8);
        }else{
            $produk = Produk::where('status_jual', '1')->paginate(8);
        }

        $kategori = Kategori::all();

        if(!Auth::user()){
            return view('users.home',compact('produk', 'kategori'));
        }else{
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $keranjang = [];
            if(!empty($pesanan)){
                $keranjang = Keranjang::where('pesanan_id', $pesanan->id)->get();
            }
            $bnyak = count($keranjang);
            return view('users.home',compact('produk', 'kategori', 'bnyak'));
        }
    }

    public function detail_produk($slug_produk)
    {
        $produk = Produk::where('slug_produk', $slug_produk)->first();
        $produk_kategori = Produk::where('kategori_id', $produk->kategori_id)->orderByDesc('id')->get();
        if(!Auth::user()){
            return view('users.detail_produk',compact('produk', 'produk_kategori'));
        }else{
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $keranjang = [];
            if(!empty($pesanan)){
                $keranjang = Keranjang::where('pesanan_id', $pesanan->id)->get();
            }
            $bnyak = count($keranjang);
            return view('users.detail_produk',compact('produk', 'produk_kategori', 'bnyak'));
        }
    }

    public function kategori(Request $request, $slug_kategori)
    {
        $kategoris = Kategori::where('slug_kategori', $slug_kategori)->first();
        $produk = Produk::where('status_jual', '1')->where('kategori_id', $kategoris['id'])->get();    

        $kategori = Kategori::all();    

        if($request->has('search')){
            $produk = Produk::where('status_jual', '1')->where('kategori_id', $kategoris['id'])->where('nama_produk','LIKE','%' .$request->search.'%')->paginate(8);
        }else{
            $produk = Produk::where('status_jual', '1')->where('kategori_id', $kategoris['id'])->paginate(8);
        }        

        if(!Auth::user()){
            return view('users.home',compact('produk', 'kategori'));
        }else{
            $bnyak = count(Keranjang::where('user_id', Auth::user()->id)->get());
            return view('users.home',compact('produk', 'kategori', 'bnyak'));
        }
    }

}
