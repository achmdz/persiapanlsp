<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_produk');
            $table->string('nama_pemesan');
            $table->string('no_telepon');
            $table->string('kode_pos');
            $table->integer('count');
            $table->text('alamat_pemesan');
            $table->string('status')->default('Belum dikonfimasi');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('id_produk')->references('id')->on('produks')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
