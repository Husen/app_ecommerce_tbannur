<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk')->unique();
            $table->string('slug_produk')->unique();
            $table->string('merk', 50)->nullable();
            $table->foreignId('kategori_id');
            $table->integer('berat');
            $table->integer('harga');
            $table->integer('potongan_harga');
            $table->integer('stok');
            $table->integer('jenis_produk'); //('0 = Bahan Material or 1 = Alat Material'); // jika kota user di cianjur maka tampil
            $table->integer('status_jual'); //('0 tidak di post, 1 di post');
            $table->string('deskripsi_produk');
            $table->string('gambar_produk', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
