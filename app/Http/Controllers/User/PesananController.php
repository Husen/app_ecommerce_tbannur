<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Keranjang;
use App\Models\Kecamatan;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Auth;

class PesananController extends Controller
{
    public function index($id)
    {

        if(Auth::user()->id != $id){
            return redirect('user');
        }


        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-97gkjBqoTy7rbdQ8moR4cFNN';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;


        $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $keranjang = [];
        if(!empty($pesanans)){
            $keranjang = Keranjang::where('pesanan_id', $pesanans->id)->get();
        }


        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=',0)->orderByDesc('id')->get();
        foreach($pesanan as $pesanans){
            if($pesanans->transaction_status == 'pending'){
                $status = \Midtrans\Transaction::status($pesanans->order_id);

                if($status->transaction_status != 'pending'){
                    $pesanans->transaction_status = $status->transaction_status;
                    $pesanans->status = 3;
                    $pesanans->update();
                }
            }
        }

        $bnyak = count($keranjang);

        return view('users.pesanan', compact('pesanan', 'bnyak'));
    }

    public function no_resi(Request $request)
    {
        $pesanan = Pesanan::find($request->id_pesanan);
        $pesanan->no_resi = $request->no_resi;
        $pesanan->update();
        return redirect('admin/kelola_pesanan')->with('toast_success', 'Berhasil Tambah Nomor Resi');
    }

    public function detail_pesanan($id)
    {

        $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $user = User::where('id', Auth::user()->id)->first();
        $keranjang = [];
        if(!empty($pesanans)){
            $keranjang = Keranjang::where('pesanan_id', $pesanans->id)->get();
        }

        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_detail = Keranjang::where('pesanan_id', $pesanan->id)->get();

        $bnyak = count($keranjang);

        return view('users.detail_pesanan', compact('pesanan_detail', 'user', 'pesanan', 'bnyak'));
    }

    public function invoice($id)
    {
        // parameter id adalah id pesanan
        $pesanan = Pesanan::where('id', $id)->first();
        $user = User::where('id', $pesanan->user_id)->first();
        $pesanan_detail = Keranjang::where('pesanan_id', $pesanan->id)->get();


        return view('layouts.invoice.invoice', compact('user', 'pesanan', 'pesanan_detail'));
    }

    public function pilihKurir($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $pesanan = Pesanan::find($id);

        $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->first();
        $keranjang = [];
        if(!empty($pesanans)){
            $keranjang = Keranjang::where('pesanan_id', $pesanans->id)->get();
        }

        $cost = RajaOngkir::ongkosKirim([
            'origin'        => 104,     // ID kota/kabupaten asal
            'destination'   => $user->kota_id,
            'weight'        => $pesanan->Subtotal_berat,    // berat barang dalam gram
            'courier'       => 'jne'    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();
        // return response()->json($cost);
        // die;

        // $this->nama_jasa = $cost[0]['name'];
        $result = [];
        foreach($cost[0]['costs'] as $row){
            $result[] = array(
                'description'   => $row['description'],
                'biaya'         => $row['cost'][0]['value'],
                'etd'           => $row['cost'][0]['etd']
            );
        }

        // dd($result);

        $bnyak = count($keranjang);
        return view('users.pengiriman', compact('bnyak', 'result', 'pesanan'));
    }

    public function save_ongkir(Request $request)
    {
        $pesanan = Pesanan::find($request->id_pesanan);
        $pesanan->status = 2;
        $pesanan->Subtotal_harga = $pesanan->Subtotal_harga+$request->ongkir;
        $pesanan->metode_pengiriman = 'jne';
        $pesanan->update();
        return redirect('user/pesanan/'.Auth::user()->id)->with('toast_success', 'Silahkan lanjutkan pembayaran');
    }

    public function cekOngkir($id)
    {        
        $user = Auth::user()->find($id);
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => 104,     // ID kota/kabupaten asal
            'destination'   => $user->kota_id,
            'weight'        => 1000,    // berat barang dalam gram
            'courier'       => 'jne'    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();
        return response()->json($cost);
    }

    public function bayar($id)
    {
        $pesanan = Pesanan::find($id);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-97gkjBqoTy7rbdQ8moR4cFNN';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
         
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $pesanan->Subtotal_harga,
            ),
            'customer_details' => array(
                'first_name' => $pesanan->user->nama_user,
                'email' => $pesanan->user->email,
                'phone' => $pesanan->user->noTelp,
            ),
        );
         
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // dd($params);
        return view('users.bayar', compact('snapToken', 'pesanan'));
    }

    public function kode_bayar($id)
    {
        $pesanan = Pesanan::find($id);
        
        return view('users.kode_bayar', compact('pesanan'));
    }

    public function pay(){

    }

    // form konfirmasi pesanan
    public function get_bayar(Request $request)
    {
        $pesan = Pesanan::find($request->id_pesanan);
        $pesan->order_id = $request->order_id;
        $pesan->payment_type = $request->payment_type;
        $pesan->method = isset($request->method) ? $request->method : null;
        $pesan->va_number = isset($request->va_number) ? $request->va_number : null;
        $pesan->transaction_status = $request->transaction_status;
        $pesan->update();

        return redirect('user/pesanan/'.$pesan->id);
    }

    public function profil($id)
    {
        if(Auth::user()->id != $id){
            return redirect('user');
        }

        //memanggil function get_province
        $provinsi = $this->get_provinsi();
        $kecamatan = Kecamatan::all();
        $user = User::find($id);

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $keranjang = [];
        if(!empty($pesanan)){
            $keranjang = Keranjang::where('pesanan_id', $pesanan->id)->get();
        }
        $bnyak = count($keranjang); 

        return view('users.profil',compact('user','bnyak', 'provinsi', 'kecamatan'));
    }

    public function update_profil(Request $request)
    {                
        if($request->province_id == ""){
            $user = User::where('id', Auth::user()->id)->first();
            $user->nama_user        = $request->nama_user;
            $user->kecamatan_id     = $request->kecamatan_id;
            $user->kecamatan_nama   = $request->kecamatan_nama;
            $user->desa             = $request->desa;
            $user->kode_pos         = $request->kode_pos;
            $user->noTelp           = $request->noTelp;
            $user->detail_alamat    = $request->detail_alamat;
            $user->update();
        }else{

            $get_provinsi_name = RajaOngkir::provinsi()->find($request->province_id);
            $provinsi_name = $get_provinsi_name['province'];

            $get_kota_name = RajaOngkir::kota()->find($request->kota_id);
            $kota_name = $get_kota_name['city_name'];

            $user = User::where('id', Auth::user()->id)->first();
            $user->nama_user        = $request->nama_user;
            $user->provinsi_id      = $request->province_id;
            $user->kota_id          = $request->kota_id;
            $user->provinsi_nama    = $provinsi_name;
            $user->kota_nama        = $kota_name;
            $user->kecamatan_id     = $request->kecamatan_id;
            $user->kecamatan_nama   = $request->kecamatan_nama;
            $user->desa             = $request->desa;
            $user->kode_pos         = $request->kode_pos;
            $user->noTelp           = $request->noTelp;
            $user->detail_alamat    = $request->detail_alamat;
            $user->update();
        }
        return redirect('user/profil/'.Auth::user()->id)->with('toast_success', 'Profil Berhasil Diupdate!');
    }

    public function get_provinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: da378bc77057c70ee621e401ee0423d0"
          ),
        ));

        

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //ini kita decode data nya terlebih dahulu
            $response=json_decode($response,true);
            //ini untuk mengambil data provinsi yang ada di dalam rajaongkir resul
            $data_pengirim = $response['rajaongkir']['results'];
            return $data_pengirim;
        }
    }

    public function get_kota($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=$id",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: da378bc77057c70ee621e401ee0423d0"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response=json_decode($response,true);
            $data_kota = $response['rajaongkir']['results'];
            return json_encode($data_kota);
        }
    }




}
