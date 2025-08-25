<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warga_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id'); // ← ini sudah langsung dimasukkan di sini
            $table->integer('jumlah_pembayaran');
            $table->dateTime('tanggal_pembayaran');
            $table->string('status')->default('Belum Bayar');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('warga_id')->references('id')->on('warga')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // opsional
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
    
};
