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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pembeli_id');
            $table->unsignedBigInteger('mobil_id');
            $table->integer('jumlah');
            $table->decimal('total_harga', 15, 2);
            $table->string('status');
            $table->timestamps();

            $table->foreign('pembeli_id')->references('id')->on('users');
            $table->foreign('mobil_id')->references('id')->on('mobils');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
