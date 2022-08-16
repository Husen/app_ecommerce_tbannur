<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\Produk;

use Auth;

class KeranjangController extends Controller
{
    public function index($id)
    {
        if(Auth::user()->id != $id){
            return redirect('user');
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $keranjang = [];
        if(!empty($pesanan)){
            $keranjang = Keranjang::where('pesanan_id', $pesanan->id)->get();
        }

        $bnyak = count($keranjang);

        return view('users.keranjang', compact('pesanan', 'keranjang', 'bnyak'));
    }

    
    public function create(Request $request)
    {
        $produk = Produk::where('id', $request->produk_id)->first();
        $harga_produk = $produk->harga-$produk->potongan_harga;
        $tanggal = date('Y-m-d');
        $totalBerat_ = $produk->berat*$request->jumlah_pesan;
        $totalHarga_ = $harga_produk*$request->jumlah_pesan;
        //cek apakah sudah mengisi provinsi dan kota?
        if(Auth::user()->kota_id == 0){
            return redirect('user/profil/'.Auth::user()->id)->with('toast_error', 'Mohon lengkapi data anda!');
        }else{
            // proses tambah keranjang orang cianjur
            if(Auth::user()->kota_id == 104){

                // validasi jumlah pesan dengan stok tersedia
                if($request->jumlah_pesan > $produk->stok){
                    return redirect()->back()->with('toast_error', 'Gagal, Jumlah Pesanan Melebihi Stok!');
                }

                // cek user memiliki keranjang pesanan
                $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
                // buat id pesanan baru
                if(empty($cek_pesanan)){
                    $pesanan = New Pesanan;
                    $pesanan->user_id = Auth::user()->id;
                    $pesanan->kode_pesanan = date('d-m-Y H:i:s');
                    $pesanan->tanggal_pesanan = $tanggal;
                    $pesanan->Subtotal_berat = $totalBerat_;
                    $pesanan->Subtotal_harga = $totalHarga_;
                    $pesanan->status = 0;
                    $pesanan->save();
                }

                // simpan data ke keranjang
                $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

                // cek keranjang
                $cek_keranjang = Keranjang::where('produk_id', $request->produk_id)->where('pesanan_id', $pesanan_baru->id)->first();
                if(empty($cek_keranjang)){
                    // tambah produk baru ke keranjang
                    $keranjang = new Keranjang;
                    $keranjang->produk_id = $request->produk_id;
                    $keranjang->pesanan_id = $pesanan_baru->id;
                    $keranjang->jumlah = $request->jumlah_pesan;
                    $keranjang->total_berat = $totalBerat_;
                    $keranjang->total_harga = $totalHarga_;
                    $keranjang->save();
                }else{
                    // update jumlah produk ke keranjang
                    $keranjang = Keranjang::where('produk_id', $request->produk_id)->where('pesanan_id', $pesanan_baru->id)->first();

                    $jumlah_baru = $keranjang->jumlah+$request->jumlah_pesan;

                    $keranjang->jumlah = $jumlah_baru;
                    $keranjang->total_berat = $produk->berat*$jumlah_baru;
                    $keranjang->total_harga = $harga_produk*$jumlah_baru;
                    $keranjang->update();                    
                }             

                $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
                $get_keranjang = Keranjang::where('pesanan_id', $pesanan->id)->get();

                $totalBerat = [];
                if ($get_keranjang != null) {
                    foreach ($get_keranjang as $keranjangs) {
                        $totalBerat[] = $keranjangs->total_berat;
                    }
                }

                $totalHarga = [];
                if ($get_keranjang != null) {
                    foreach ($get_keranjang as $keranjangs) {
                        $totalHarga[] = $keranjangs->total_harga;
                    }
                }

                $subBerat = array_sum($totalBerat);
                $subTotal = array_sum($totalHarga);

                $pesanan->Subtotal_berat = $subBerat;
                $pesanan->Subtotal_harga = $subTotal;
                $pesanan->update();

                return redirect('user/keranjang/'.Auth::user()->id)->with('toast_success', 'Berhasil menambahkan produk ke dalam keranjang!');

            // jika kota != cianjur
            }else{
                // validasi jenis produk yang berat tidak bisa di proses
                if($produk->jenis_produk == 0){
                    return redirect()->back()->with('toast_error', 'Gagal, Pesanan Khusus Daerah Jawa Barat, Cianjur!');
                }

                // validasi total berat melebihi kapasitas pengiriman
                if($totalBerat_ > 8001){
                    return redirect()->back()->with('toast_error', 'Gagal, Total Berat Produk Melebihi Kapasitas!');
                }

                // validasi jumlah pesan dengan stok tersedia
                if($request->jumlah_pesan > $produk->stok){
                    return redirect()->back()->with('toast_error', 'Gagal, Jumlah Pesanan Melebihi Stok!');
                }

                // cek user memiliki keranjang pesanan
                $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
                // buat id pesanan baru
                if(empty($cek_pesanan)){
                    $pesanan = New Pesanan;
                    $pesanan->user_id = Auth::user()->id;
                    $pesanan->kode_pesanan = date('d-m-Y H:i:s');
                    $pesanan->tanggal_pesanan = $tanggal;
                    $pesanan->Subtotal_berat = $totalBerat_;
                    $pesanan->Subtotal_harga = $totalHarga_;
                    $pesanan->status = 0;
                    $pesanan->save();
                }

                // simpan data ke keranjang
                $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

                // cek keranjang
                $cek_keranjang = Keranjang::where('produk_id', $request->produk_id)->where('pesanan_id', $pesanan_baru->id)->first();
                if(empty($cek_keranjang)){
                    // tambah produk baru ke keranjang
                    $keranjang = new Keranjang;
                    $keranjang->produk_id = $request->produk_id;
                    $keranjang->pesanan_id = $pesanan_baru->id;
                    $keranjang->jumlah = $request->jumlah_pesan;
                    $keranjang->total_berat = $totalBerat_;
                    $keranjang->total_harga = $totalHarga_;
                    $keranjang->save();
                }else{
                    // update jumlah produk ke keranjang
                    $keranjang = Keranjang::where('produk_id', $request->produk_id)->where('pesanan_id', $pesanan_baru->id)->first();

                    $jumlah_baru = $keranjang->jumlah+$request->jumlah_pesan;

                    $keranjang->jumlah = $jumlah_baru;
                    $keranjang->total_berat = $produk->berat*$jumlah_baru;
                    $keranjang->total_harga = $harga_produk*$jumlah_baru;
                    $keranjang->update();
                    
                }                

                $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
                $get_keranjang = Keranjang::where('pesanan_id', $pesanan->id)->get();

                $totalBerat = [];
                if ($get_keranjang != null) {
                    foreach ($get_keranjang as $keranjangs) {
                        $totalBerat[] = $keranjangs->total_berat;
                    }
                }

                $totalHarga = [];
                if ($get_keranjang != null) {
                    foreach ($get_keranjang as $keranjangs) {
                        $totalHarga[] = $keranjangs->total_harga;
                    }
                }

                $subBerat = array_sum($totalBerat);
                $subTotal = array_sum($totalHarga);

                $pesanan->Subtotal_berat = $subBerat;
                $pesanan->Subtotal_harga = $subTotal;
                $pesanan->update();

                return redirect('user/keranjang/'.Auth::user()->id)->with('toast_success', 'Berhasil menambahkan produk ke dalam keranjang!');
            }
        }
    }

    public function update(Request $request)
    {
        $produk = Produk::where('id', $request->produk_id)->first();
        $harga_produk = $produk->harga-$produk->potongan_harga;
        $totalBerat_ = $produk->berat*$request->jumlah_pesan;
        $totalHarga_ = $harga_produk*$request->jumlah_pesan;

        // jika orang cianjur
        if(Auth::user()->kota_id == 104){

            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            // update jumlah produk di keranjang
            $keranjang = Keranjang::where('produk_id', $request->produk_id)->where('pesanan_id', $pesanan->id)->first();

            $jumlah_baru = $keranjang->jumlah+$request->jumlah_pesan;

            $keranjang->jumlah = $request->jumlah_pesan;
            $keranjang->total_berat = $totalBerat_;
            $keranjang->total_harga = $totalHarga_;
            $keranjang->update();

            $get_keranjang = Keranjang::where('pesanan_id', $pesanan->id)->get();

            $totalBerat = [];
            if ($get_keranjang != null) {
                foreach ($get_keranjang as $keranjangs) {
                    $totalBerat[] = $keranjangs->total_berat;
                }
            }

            $totalHarga = [];
            if ($get_keranjang != null) {
                foreach ($get_keranjang as $keranjangs) {
                    $totalHarga[] = $keranjangs->total_harga;
                }
            }

            $subBerat = array_sum($totalBerat);
            $subTotal = array_sum($totalHarga);

            $pesanan->Subtotal_berat = $subBerat;
            $pesanan->Subtotal_harga = $subTotal;
            $pesanan->update();

            return redirect('user/keranjang/'.Auth::user()->id)->with('toast_success', 'Berhasil update keranjang!');

        // jika lain orang cianjur
        }else{

            // validasi total berat melebihi kapasitas pengiriman
            if($totalBerat_ > 8001){
                return redirect()->back()->with('toast_error', 'Gagal, Total Berat Produk Melebihi Kapasitas!');
            }

            // validasi jumlah pesan dengan stok tersedia
            if($request->jumlah_pesan > $produk->stok){
                return redirect()->back()->with('toast_error', 'Gagal, Jumlah Pesanan Melebihi Stok!');
            }

            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            // update jumlah produk di keranjang
            $keranjang = Keranjang::where('produk_id', $request->produk_id)->where('pesanan_id', $pesanan->id)->first();

            $jumlah_baru = $keranjang->jumlah+$request->jumlah_pesan;

            $keranjang->jumlah = $request->jumlah_pesan;
            $keranjang->total_berat = $totalBerat_;
            $keranjang->total_harga = $totalHarga_;
            $keranjang->update();

            $get_keranjang = Keranjang::where('pesanan_id', $pesanan->id)->get();

            $totalBerat = [];
            if ($get_keranjang != null) {
                foreach ($get_keranjang as $keranjangs) {
                    $totalBerat[] = $keranjangs->total_berat;
                }
            }

            $totalHarga = [];
            if ($get_keranjang != null) {
                foreach ($get_keranjang as $keranjangs) {
                    $totalHarga[] = $keranjangs->total_harga;
                }
            }

            $subBerat = array_sum($totalBerat);
            $subTotal = array_sum($totalHarga);

            $pesanan->Subtotal_berat = $subBerat;
            $pesanan->Subtotal_harga = $subTotal;
            $pesanan->update();

            return redirect('user/keranjang/'.Auth::user()->id)->with('toast_success', 'Berhasil update keranjang!');
        }
    }
    

    public function delete(Request $request)
    {
        $keranjang = Keranjang::find($request->id);
        $keranjang->delete();

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $get_keranjang = Keranjang::where('pesanan_id', $pesanan->id)->get();

        $totalBerat = [];
        if ($get_keranjang != null) {
            foreach ($get_keranjang as $keranjangs) {
                $totalBerat[] = $keranjangs->total_berat;
            }
        }

        $totalHarga = [];
        if ($get_keranjang != null) {
            foreach ($get_keranjang as $keranjangs) {
                $totalHarga[] = $keranjangs->total_harga;
            }
        }

        $subBerat = array_sum($totalBerat);
        $subTotal = array_sum($totalHarga);

        $pesanan->Subtotal_berat = $subBerat;
        $pesanan->Subtotal_harga = $subTotal;
        $pesanan->update();

        
        return redirect('user/keranjang/'.Auth::user()->id)->with('toast_success', 'Keranjang berhasil di hapus');
    }


    public function checkout_keranjang()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $get_keranjang = Keranjang::where('pesanan_id', $pesanan->id)->get();        
        $user = User::where('id', Auth::user()->id)->first();

        $jenisProduk = [];
        foreach($get_keranjang as $keranjangs){
            $jenisProduk[] = $keranjangs->produk->jenis_produk;
        }

        $cekJenisproduk = array_product($jenisProduk);

        // apakah orang cianjur?
        if(Auth::user()->kota_id == 104){
            // apakah ada produk dengan jenis_produk 0?
            if($cekJenisproduk != 0){
                // apakah total berat > 8000
                if($pesanan->Subtotal_berat > 8001){
                    // pembelian melewati batas
                    return redirect()->back()->with('toast_error', 'Gagal, Total Berat Melewati Batas Untuk Pengiriman Ekspedisi, Maksimal Total Berat adalah 8000gram!');
                }else{
                    // echo "orang cianjur pengiriman lewat ekspedisi";
                    foreach($get_keranjang as $keranjangs){
                        $produk = Produk::where('id', $keranjangs->produk_id)->first();
                        $produk->stok = $produk->stok-$keranjangs->jumlah;
                        $produk->update();
                    }

                    $pesanan->status =  1;
                    $pesanan->update();
                    return redirect('user/pesanan/'.Auth::user()->id)->with('toast_success', 'Silahkan lanjutkan pembayaran');
                }
            }else{
                // echo "pengiriman lewat kurir toko";
                foreach($get_keranjang as $keranjangs){
                    $produk = Produk::where('id', $keranjangs->produk_id)->first();
                    $produk->stok = $produk->stok-$keranjangs->jumlah;
                    $produk->update();
                }

                $pesanan->status =  2;
                $pesanan->metode_pengiriman = 'Kurirtoko';
                $pesanan->Subtotal_harga = $pesanan->Subtotal_harga+$user->kecamatan->harga_ongkir;
                $pesanan->update();
                return redirect('user/pesanan/'.Auth::user()->id)->with('toast_success', 'Silahkan lanjutkan pembayaran');
            }
        }else{
            if($pesanan->Subtotal_berat > 8001){
                // pembelian melewati batas
                return redirect()->back()->with('toast_error', 'Gagal, Total Berat Melewati Batas Untuk Pengiriman Ekspedisi, Maksimal Total Berat adalah 8000gram!');
            }else{
                // echo "orang luar pengiriman lewat ekspedisi";
                foreach($get_keranjang as $keranjangs){
                    $produk = Produk::where('id', $keranjangs->produk_id)->first();
                    $produk->stok = $produk->stok-$keranjangs->jumlah;
                    $produk->update();
                }

                $pesanan->status =  1;
                $pesanan->update();
                return redirect('user/pesanan/'.Auth::user()->id)->with('toast_success', 'Silahkan lanjutkan pembayaran');
            }
        }
    }
}
