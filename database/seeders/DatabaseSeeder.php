<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Kecamatan;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Produk::factory(5)->create();

        User::create([
            'nama_user' => 'admin tb annur',
            'email'     => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password'  => Hash::make('admin123'),
            'level'     => 'admin',
            'foto_user' => 'user.png',
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Cibeber',
            'harga_ongkir'   => '35000'
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Warungkondang',
            'harga_ongkir'   => '30000'
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Cilaku',
            'harga_ongkir'   => '30000'
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Sukaluyu',
            'harga_ongkir'   => '30000'
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Bojongpicung',
            'harga_ongkir'   => '15000'
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Haurwangi',
            'harga_ongkir'   => '20000'
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Ciranjang',
            'harga_ongkir'   => '15000'
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Mande',
            'harga_ongkir'   => '30000'
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Karangtengah',
            'harga_ongkir'   => '20000'
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Cianjur',
            'harga_ongkir'   => '25000'
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Cugenang',
            'harga_ongkir'   => '35000'
        ]);


        // kat1
        Kategori::create([
            'nama_kategori' => 'Bahan Material',
            'slug_kategori' => 'bahan-material',            
        ]);

        // kat2
        Kategori::create([
            'nama_kategori' => 'Semen',
            'slug_kategori' => 'semen',            
        ]);

        // kat3
        Kategori::create([
            'nama_kategori' => 'Cat',
            'slug_kategori' => 'cat',            
        ]);

        // kat4
        Kategori::create([
            'nama_kategori' => 'Paku',
            'slug_kategori' => 'paku',            
        ]);

        // kat5
        Kategori::create([
            'nama_kategori' => 'Kayu',
            'slug_kategori' => 'kayu',            
        ]);

        // kat6
        Kategori::create([
            'nama_kategori' => 'Batako',
            'slug_kategori' => 'batako',            
        ]);

        // kat7
        Kategori::create([
            'nama_kategori' => 'Keramik',
            'slug_kategori' => 'keramik',            
        ]);

        // kat8
        Kategori::create([
            'nama_kategori' => 'Alat Tukang',
            'slug_kategori' => 'alat-tukang',            
        ]);


        Produk::create([
            'nama_produk'   => 'Triplex Ukuran 80x220cm',
            'slug_produk'   => 'triplex-ukuran-80x220cm',
            'merk'          => 'none',
            'kategori_id'   => '5',
            'berat'         => '5000',
            'harga'         => '70000',
            'potongan_harga'=> '2000',
            'stok'          => '993',
            'jenis_produk'  => '0',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => '80x220.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Alat Cangkul Tanaman',
            'slug_produk'   => 'alat-cangkul-tanaman',
            'merk'          => 'none',
            'kategori_id'   => '8',
            'berat'         => '800',
            'harga'         => '34000',
            'potongan_harga'=> '0',
            'stok'          => '320',
            'jenis_produk'  => '1',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'alat cangkul.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Cat Kayu Kalengan Avian',
            'slug_produk'   => 'cat-kayu-kalengan-avian',
            'merk'          => 'Avian',
            'kategori_id'   => '3',
            'berat'         => '3200',
            'harga'         => '60000',
            'potongan_harga'=> '3000',
            'stok'          => '500',
            'jenis_produk'  => '1',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'avian.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Cat Tembok Kalengan Avitex',
            'slug_produk'   => 'cat-tembok-kalengan-avitex',
            'merk'          => 'Avitex',
            'kategori_id'   => '3',
            'berat'         => '3200',
            'harga'         => '70000',
            'potongan_harga'=> '3000',
            'stok'          => '704',
            'jenis_produk'  => '1',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'avitex.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Batako Putih Ukuran 20x60cm',
            'slug_produk'   => 'batako-putih-ukuran-20x60cm',
            'merk'          => 'none',
            'kategori_id'   => '1',
            'berat'         => '90000',
            'harga'         => '280000',
            'potongan_harga'=> '0',
            'stok'          => '80',
            'jenis_produk'  => '0',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'batako 20x60.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Siap Kirim Besi Beton Khusus Daerah Cianjur',
            'slug_produk'   => 'siap-kirim-besi-beton-khusus-daerah-cianjur',
            'merk'          => 'none',
            'kategori_id'   => '1',
            'berat'         => '80000',
            'harga'         => '800000',
            'potongan_harga'=> '0',
            'stok'          => '20',
            'jenis_produk'  => '0',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'daftar harga besi beton 2021.JPG'
        ]);

        Produk::create([
            'nama_produk'   => 'Cat Tembok Kalengan Decolith',
            'slug_produk'   => 'cat-tembok-kalengan-decolith',
            'merk'          => 'Decolith',
            'kategori_id'   => '3',
            'berat'         => '3000',
            'harga'         => '46000',
            'potongan_harga'=> '0',
            'stok'          => '560',
            'jenis_produk'  => '1',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'decolith.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Cat Tembok Kalengan Dulux',
            'slug_produk'   => 'cat-tembok-kalengan-dulux',
            'merk'          => 'Dulux',
            'kategori_id'   => '3',
            'berat'         => '3000',
            'harga'         => '76000',
            'potongan_harga'=> '4000',
            'stok'          => '360',
            'jenis_produk'  => '1',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'dulux.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Pasir Untuk Bangunan per Pickup',
            'slug_produk'   => 'pasir-untuk-bangunan-per-pickup',
            'merk'          => 'none',
            'kategori_id'   => '1',
            'berat'         => '70000',
            'harga'         => '900000',
            'potongan_harga'=> '0',
            'stok'          => '30',
            'jenis_produk'  => '0',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
        
            'gambar_produk' => 'harga pasir.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Kayu Untuk Bangunan Rumah',
            'slug_produk'   => 'kayu-untuk-bangunan-rumah',
            'merk'          => 'none',
            'kategori_id'   => '5',
            'berat'         => '10000',
            'harga'         => '220000',
            'potongan_harga'=> '9000',
            'stok'          => '90',
            'jenis_produk'  => '0',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros', 
        
            'gambar_produk' => 'kayu kaso.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Papan Kayu',
            'slug_produk'   => 'papan-kayu',
            'merk'          => 'none',
            'kategori_id'   => '5',
            'berat'         => '10000',
            'harga'         => '190000',
            'potongan_harga'=> '10000',
            'stok'          => '200',
            'jenis_produk'  => '0',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros', 
        
            'gambar_produk' => 'kayu papan.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Pacul Untuk Pasir',
            'slug_produk'   => 'pacul-untuk-pasir',
            'merk'          => 'none',
            'kategori_id'   => '8',
            'berat'         => '900',
            'harga'         => '45000',
            'potongan_harga'=> '0',
            'stok'          => '90',
            'jenis_produk'  => '1',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'pacul.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Paket Keramik',
            'slug_produk'   => 'paket-keramik',
            'merk'          => 'none',
            'kategori_id'   => '7',
            'berat'         => '9000',
            'harga'         => '700000',
            'potongan_harga'=> '9000',
            'stok'          => '67',
            'jenis_produk'  => '0',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'paket keramik.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Paku Beton Ukuran 7cm',
            'slug_produk'   => 'paku-beton-ukuran-7cm',
            'merk'          => 'Galvanis',
            'kategori_id'   => '4',
            'berat'         => '500',
            'harga'         => '20000',
            'potongan_harga'=> '2500',
            'stok'          => '100',
            'jenis_produk'  => '1',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros', 
        
            'gambar_produk' => 'paku beton 7cm.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Paku Kayu Ukuran 5cm',
            'slug_produk'   => 'paku-kayu-ukuran-5cm',
            'merk'          => 'none',
            'kategori_id'   => '4',
            'berat'         => '500',
            'harga'         => '15000',
            'potongan_harga'=> '500',
            'stok'          => '700',
            'jenis_produk'  => '1',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros', 
            'gambar_produk' => 'paku kayu 5cm.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Palu Bukan Punya Thor',
            'slug_produk'   => 'palu-bukan-punya-thor',
            'merk'          => 'Camel',
            'kategori_id'   => '8',
            'berat'         => '1000',
            'harga'         => '80000',
            'potongan_harga'=> '4000',
            'stok'          => '500',
            'jenis_produk'  => '1',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'palu merk camel.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Sekop Pengaduk Semen Dan Pasir',
            'slug_produk'   => 'sekop-pengaduk-semen-dan-pasir',
            'merk'          => 'none',
            'kategori_id'   => '8',
            'berat'         => '2000',
            'harga'         => '90000',
            'potongan_harga'=> '2000',
            'stok'          => '300',
            'jenis_produk'  => '0',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'sekop semen.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Semen 5Kg Merk 3Roda',
            'slug_produk'   => 'semen-5kg-merk-3roda',
            'merk'          => '3Roda',
            'kategori_id'   => '2',
            'berat'         => '5000',
            'harga'         => '180000',
            'potongan_harga'=> '12000',
            'stok'          => '300',
            'jenis_produk'  => '0',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'semen 3roda.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Semen Putih 5Kg Merk 3Roda',
            'slug_produk'   => 'semen-putih-5kg-merk-3roda',
            'merk'          => '3Roda',
            'kategori_id'   => '2',
            'berat'         => '5000',
            'harga'         => '190000',
            'potongan_harga'=> '0',
            'stok'          => '300',
            'jenis_produk'  => '0',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'semen putih 3roda.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Semen 5kg Merk SG',
            'slug_produk'   => 'semen-5kg-merk-sg',
            'merk'          => 'SG',
            'kategori_id'   => '2',
            'berat'         => '5000',
            'harga'         => '200000',
            'potongan_harga'=> '0',
            'stok'          => '300',
            'jenis_produk'  => '0',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'semen sg.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Pipa PVC',
            'slug_produk'   => 'pipa-pvc',
            'merk'          => 'PVC',
            'kategori_id'   => '1',
            'berat'         => '30000',
            'harga'         => '800000',
            'potongan_harga'=> '0',
            'stok'          => '40',
            'jenis_produk'  => '0',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'Tabel-Harga-Pipa-PVC-Terbaru.jpg'
        ]);

        Produk::create([
            'nama_produk'   => 'Thinner Kalengan',
            'slug_produk'   => 'thinner-kalengan',
            'merk'          => 'Thinner',
            'kategori_id'   => '3',
            'berat'         => '1000',
            'harga'         => '16000',
            'potongan_harga'=> '0',
            'stok'          => '604',
            'jenis_produk'  => '1',
            'status_jual'   => '1',
            'deskripsi_produk' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros',
            'gambar_produk' => 'thinner gloss.jpg'
        ]);
    }
}
