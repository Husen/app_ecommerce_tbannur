<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('kode_pesanan',50);
            $table->date('tanggal_pesanan');
            $table->integer('Subtotal_berat');
            $table->integer('Subtotal_harga')->comentar('total keranjang+ongkir)');
            $table->integer('status')->default(0)->comentar('0 belum checkout, 1 sudah checkout belum bayar, 2 sudah bayar proses pesanan, 3 pengiriman on proses, 4 sudah diterima, 5 pesanan gagal');


            $table->string('order_id')->nullable(); // kode pesanan
            $table->string('payment_type', 30)->nullable(); // bank/e-wallet/conter/cstore
            $table->string('method')->nullable(); // kode transaksi
            $table->string('va_number')->nullable(); // kode transaksi
            $table->string('transaction_status', 30)->nullable(); //pending or settelment     
            
            $table->string('metode_pengiriman', 50)->nullable();
            $table->string('no_resi', 50)->nullable();
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
        Schema::dropIfExists('pesanans');
    }
}
