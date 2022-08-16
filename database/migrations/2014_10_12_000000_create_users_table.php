<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_user', 50);
            $table->string('google_id')->nullable();
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('level', 10)->default('customer');
            $table->string('noTelp', 15)->nullable();
            $table->integer('provinsi_id')->default(0);
            $table->integer('kota_id')->default(0);
            $table->integer('kecamatan_id')->default(0);
            $table->string('provinsi_nama', 30)->nullable();
            $table->string('kota_nama', 30)->nullable();
            $table->string('kecamatan_nama', 30)->nullable();
            $table->string('desa', 30)->nullable();
            $table->string('kode_pos', 10)->nullable();
            $table->string('detail_alamat')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('foto_user', 2048)->default('user.png');
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
        Schema::dropIfExists('users');
    }
};
