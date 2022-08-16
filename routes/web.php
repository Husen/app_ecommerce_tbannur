<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KelolaProdukController;
use App\Http\Controllers\Admin\KelolaUserController;
use App\Http\Controllers\Admin\KelolaKategoriController;
use App\Http\Controllers\Admin\KelolaOngkirtokoController;
use App\Http\Controllers\Admin\KelolaPesananController;

use App\Http\Controllers\LoginWithGoogleController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\EmailController;



use App\Http\Controllers\User\KeranjangController;
use App\Http\Controllers\User\PesananController;


use App\Http\Controllers\Controller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/', function () {
//     return view('users.home');
// })->name('homeUser');


// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/', [HomeController::class, 'index'])->name('Home');
Route::get('kategori/{slug_kategori}', [HomeController::class, 'kategori'])->name('Kategori');
Route::get('detail_produk/{slug_produk}', [HomeController::class, 'detail_produk'])->name('detail_produk');

// Route::get('email', [EmailController::class, 'index'])->name('Email');



Route::get('auth/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);


Route::get('/logout', [Controller::class, 'logout'])->name('logout');

// middleware pembagian hak akses
// admin
Route::group(['middleware' => ['auth', 'level:admin']], function(){

    // admin page

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');    

    // produk
    Route::get('admin/kelola_produk', [KelolaProdukController::class, 'index'])->name('kelola_produk');
    Route::post('/tambah_produk', [KelolaProdukController::class, 'tambah'])->name('tambah_produk');
    Route::get('admin/ubah_produk/{id}', [KelolaProdukController::class, 'ubah_produk'])->name('ubah_produk');
    Route::post('/update_produk/{id}', [KelolaProdukController::class, 'update_produk'])->name('update_produk');
    Route::post('/hapus_produk/{id}', [KelolaProdukController::class, 'hapus_produk'])->name('hapus_produk');
    // Route::get('/hapus_produk/{id}', [KelolaProdukController::class, 'hapus_produk'])->name('hapus_produk');

    // user / data pembeli
    Route::get('admin/kelola_user', [KelolaUserController::class, 'index'])->name('kelola_user');

    // kategori
    Route::get('admin/kelola_kategori', [KelolaKategoriController::class, 'index'])->name('kelola_kategori');
    Route::post('admin/tambah_kategori', [KelolaKategoriController::class, 'tambah_kategori'])->name('tambah_kategori');
    Route::post('admin/update_kategori', [KelolaKategoriController::class, 'update_kategori'])->name('update_kategori');
    Route::post('admin/hapus_kategori', [KelolaKategoriController::class, 'hapus_kategori'])->name('hapus_kategori');

    // ongkir toko
    Route::get('admin/kelola_ongkir', [KelolaOngkirtokoController::class, 'index'])->name('kelola_ongkir');
    Route::post('admin/tambah_ongkir', [KelolaOngkirtokoController::class, 'tambah_ongkir'])->name('tambah_ongkir');
    Route::post('admin/update_ongkir', [KelolaOngkirtokoController::class, 'update_ongkir'])->name('update_ongkir');
    Route::post('admin/hapus_ongkir', [KelolaOngkirtokoController::class, 'hapus_ongkir'])->name('hapus_ongkir');

    // kelola pesanan
    Route::get('admin/kelola_pesanan', [KelolaPesananController::class, 'index'])->name('kelola_pesanan');

    // invoice
    Route::get('admin/invoice/{id}', [PesananController::class, 'invoice'])->name('pesanan-invoice');

    Route::post('admin/no_resi', [PesananController::class, 'no_resi'])->name('pesanan-resi');

});


// customer
Route::group(['middleware' => ['auth', 'level:customer']], function(){
    // halaman utama with session
    Route::get('/user', [HomeController::class, 'index'])->name('Home');
    // halaman profil
    Route::get('user/profil/{id}', [PesananController::class, 'profil'])->name('data-diri');
    Route::post('user/update_profil', [PesananController::class, 'update_profil'])->name('update-data-diri');

    // halaman keranjang
    Route::get('user/keranjang/{id}', [KeranjangController::class, 'index'])->name('keranjang');
    Route::post('user/tambah_keranjang', [KeranjangController::class, 'create'])->name('tambah-keranjang');
    Route::post('user/update_keranjang', [KeranjangController::class, 'update'])->name('update-keranjang');
    Route::post('user/hapus_keranjang', [KeranjangController::class, 'delete'])->name('hapus-keranjang');
    Route::get('user/cekout', [KeranjangController::class, 'checkout_keranjang'])->name('checkout-keranjang');

    // halaman transaksi dan kelola pesanan
    Route::get('user/pesanan/{id}', [PesananController::class, 'index'])->name('pesanan-pembeli');
    Route::get('user/pilihKurir/{id}', [PesananController::class, 'pilihKurir'])->name('pesanan-pembeli');
    Route::post('user/get_ongkir', [PesananController::class, 'save_ongkir'])->name('ongkir-pesanan');
    Route::get('user/detail_pesanan/{id}', [PesananController::class, 'detail_pesanan'])->name('pesanan-detail');

    // invoice
    Route::get('user/invoice/{id}', [PesananController::class, 'invoice'])->name('pesanan-invoice');

    Route::get('user/bayar/{id}', [PesananController::class, 'bayar'])->name('pesanan-bayar');
    Route::get('user/kode_bayar/{id}', [PesananController::class, 'kode_bayar'])->name('kode-bayar');
    // Route::get('user/pay', [PesananController::class, 'pay'])->name('pesanan-bayar');
    Route::post('user/bayar', [PesananController::class, 'get_bayar'])->name('pesanan-proses-bayar');


    // controller untuk get API Rajaongkir alamat
    Route::get('user/cek-kota/{id}', [PesananController::class, 'get_kota']);
    Route::get('user/pengiriman/{id}', [PesananController::class, 'pengiriman'])->name('pengiriman');
    // Route::get('user/cek-provinsi', [PesananController::class, 'get_provinsi'])->name('provinsi');

    // controller untuk get API Rajaongkir ongkos kirim
    Route::post('user/cek_ongkir', [PesananController::class, 'cekOngkir'])->name('ongkir');

});
